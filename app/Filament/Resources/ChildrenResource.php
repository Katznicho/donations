<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ChildrenResource\Pages;
use App\Filament\Resources\ChildrenResource\RelationManagers;
use App\Models\Children;
use Carbon\Carbon;
use Filament\Forms;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Repeater;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Filters\Indicator;


class ChildrenResource extends Resource
{
    protected static ?string $model = Children::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationGroup = 'Beneficiaries';

    protected static ?string $navigationLabel = 'Children';

    public static function getPluralLabel(): ?string
    {
        return "Children";
    }



    public static function getGloballySearchableAttributes(): array
    {
        return ["name", "gender"];
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                // Forms\Components\Section::make('Create a new child')
                Forms\Components\Section::make(
                    fn ($context) =>
                    $context === 'edit' ? 'Editing Child' : ($context === 'create' ? 'Creating a new Child' : 'Viewing Child')
                )
                    ->description(fn ($context) => $context === 'edit' ? 'Editing an existing child record.' : ($context === 'create' ? 'Creating a new child record.' : 'Viewing a child record.'))
                    ->schema([
                        Forms\Components\TextInput::make('first_name')
                            ->required()
                            ->maxLength(255)
                            ->label("First Name"),
                        Forms\Components\TextInput::make('middle_name')
                            ->label("Middle Name")
                            ->maxLength(255),
                        Forms\Components\TextInput::make('second_name')
                            ->required()
                            ->maxLength(255)
                            ->label("Second Name"),
                        Select::make('gender')
                            ->options([
                                'Male' => 'Male',
                                'Female' => 'Female',
                            ])
                            ->required()
                            ->label("Gender"),
                        DatePicker::make('date_of_birth')
                            ->label("Date Of Birth")
                            ->required()
                            ->label("Date of Birth"),
                        // Forms\Components\TextInput::make('story'),
                        MarkdownEditor::make('story')
                            ->required()
                            ->label("Child Story"),
                        // Forms\Components\TextInput::make('hobby'),

                        MarkdownEditor::make('hobby')
                            ->required()
                            ->label("Child Hobby"),
                        Forms\Components\FileUpload::make('profile_picture')
                            ->directory('children')
                            ->image()
                            ->label('Child Image')
                            ->required(),

                    ])

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('profile_picture')
                    ->label("Cover Image")
                    ->disk("children")
                    ->circular(),
                Tables\Columns\TextColumn::make('first_name')
                    ->searchable()
                    ->sortable()
                    ->toggleable()
                    ->copyable()
                    ->label('First Name'),
                Tables\Columns\TextColumn::make('middle_name')
                    ->searchable()
                    ->sortable()
                    ->toggleable()
                    ->copyable()
                    ->label('Middle Name'),
                Tables\Columns\TextColumn::make('second_name')
                    ->searchable()
                    ->sortable()
                    ->toggleable()
                    ->copyable()
                    ->label('Second Name'),
                Tables\Columns\TextColumn::make('gender')
                    ->searchable()
                    ->sortable()
                    ->toggleable()
                    ->copyable()
                    ->label('Gender'),
                Tables\Columns\IconColumn::make('is_sponsored')
                    ->boolean()
                    ->label('Sponsored'),
                Tables\Columns\TextColumn::make('sponsor_child_count')
                    ->counts("sponsorChild")
                    ->numeric()
                    ->label('Total Sponsors'),

                Tables\Columns\TextColumn::make('deleted_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                // Tables\Filters\TrashedFilter::make(),
                Filter::make('is_sponsored')
                    ->query(fn (Builder $query): Builder => $query->where('is_sponsored', true))
                    ->indicator(fn (Builder $query): int => $query->where('is_sponsored', true)->count())
                    ->toggle()
                    ->label('Sponsored'),
                Filter::make('created_at')
                    ->form([
                        DatePicker::make('created_from'),
                        DatePicker::make('created_until'),
                    ])
                    ->query(function (Builder $query, array $data): Builder {
                        return $query
                            ->when(
                                $data['created_from'],
                                fn (Builder $query, $date): Builder => $query->whereDate('created_at', '>=', $date),
                            )
                            ->when(
                                $data['created_until'],
                                fn (Builder $query, $date): Builder => $query->whereDate('created_at', '<=', $date),
                            );
                    })
                    ->indicateUsing(function (array $data): array {
                        $indicators = [];

                        if ($data['from'] ?? null) {
                            $indicators[] = Indicator::make('Created from ' . Carbon::parse($data['from'])->toFormattedDateString())
                                ->removeField('from');
                        }

                        if ($data['until'] ?? null) {
                            $indicators[] = Indicator::make('Created until ' . Carbon::parse($data['until'])->toFormattedDateString())
                                ->removeField('until');
                        }

                        return $indicators;
                    }),
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                // Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                // Tables\Actions\BulkActionGroup::make([
                //     Tables\Actions\DeleteBulkAction::make(),
                //     Tables\Actions\ForceDeleteBulkAction::make(),
                //     Tables\Actions\RestoreBulkAction::make(),
                // ]),
            ])
            ->recordUrl(null);
    }

    public static function getRelations(): array
    {
        return [
            //
            RelationManagers\SponsorChildRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListChildrens::route('/'),
            'create' => Pages\CreateChildren::route('/create'),
            'view' => Pages\ViewChildren::route('/{record}'),
            'edit' => Pages\EditChildren::route('/{record}/edit'),
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ])
            ->where("deleted_at", null);
    }
}
