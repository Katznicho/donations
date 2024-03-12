<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TransactionResource\Pages;
use App\Filament\Resources\TransactionResource\RelationManagers;
use App\Models\Transaction;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class TransactionResource extends Resource
{
    protected static ?string $model = Transaction::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationLabel = 'Payments';

    protected static ?string $navigationGroup = 'Payments';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('sponsor_id')
                    ->relationship('sponsor', 'id'),
                Forms\Components\TextInput::make('type')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('amount')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('phone_number')
                    ->tel()
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('payment_mode')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('payment_method')
                    ->maxLength(255),
                Forms\Components\Textarea::make('description')
                    ->required()
                    ->maxLength(65535)
                    ->columnSpanFull(),
                Forms\Components\TextInput::make('reference')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('status')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('order_tracking_id')
                    ->maxLength(255),
                Forms\Components\TextInput::make('OrderNotificationType')
                    ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('sponsor.first_name')
                    ->numeric()
                    ->sortable()
                    ->searchable()
                    ->toggleable()
                    ->copyable()
                    ->copyMessage('Sponsor copied!')
                    ->label('First Name'),
                Tables\Columns\TextColumn::make('sponsor.last_name')
                    ->numeric()
                    ->sortable()
                    ->searchable()
                    ->toggleable()
                    ->copyable()
                    ->copyMessage('Sponsor copied!')
                    ->label('Last Name'),
                Tables\Columns\TextColumn::make('status')
                    ->searchable()
                    ->toggleable()
                    ->sortable()
                    ->copyable()
                    ->copyMessage('status')
                    ->label('Status')
                    ->color(function (Transaction $record) {
                        if ($record->status == "Pending") {
                            return "warning";
                        } else if ($record->status == "Failed") {
                            return "danger";
                        } else {
                            return "success";
                        }
                    }),
                Tables\Columns\TextColumn::make('type')
                    ->searchable()
                    ->toggleable()
                    ->sortable()
                    ->copyable()
                    ->copyMessage('type copied')
                    ->label('Type')
                    ->color("success"),
                Tables\Columns\TextColumn::make('amount')
                    ->money('UGX')
                    ->searchable()
                    ->toggleable()
                    ->sortable()
                    ->copyable()
                    ->label("Amount")
                    ->copyMessage('amount'),

                Tables\Columns\TextColumn::make('phone_number')
                    ->searchable()
                    ->toggleable()
                    ->sortable()
                    ->copyable()
                    ->copyMessage('phone number copied')
                    ->label('Phone Number'),
                Tables\Columns\TextColumn::make('payment_mode')
                    ->searchable()
                    ->toggleable()
                    ->sortable()
                    ->copyable()
                    ->copyMessage('payment mode copied')
                    ->label('Payment Mode'),
                Tables\Columns\TextColumn::make('payment_method')
                    ->searchable()
                    ->toggleable()
                    ->sortable()
                    ->copyable()
                    ->copyMessage('payment method copied')
                    ->label('Payment Method'),
                Tables\Columns\TextColumn::make('reference')
                    ->searchable()
                    ->toggleable()
                    ->sortable()
                    ->copyable()
                    ->copyMessage('reference copied')
                    ->label('Payment Reference'),
                Tables\Columns\TextColumn::make('order_tracking_id')
                    ->searchable()
                    ->toggleable()
                    ->sortable()
                    ->copyable()
                    ->copyMessage('tracking id copied')
                    ->label('Tracking Id'),
                Tables\Columns\TextColumn::make('OrderNotificationType')
                    ->searchable()
                    ->toggleable()
                    ->sortable()
                    ->copyable()
                    ->copyMessage('notification id copied')
                    ->label('Notification Type'),
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
            ->filters([])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                    Tables\Actions\ForceDeleteBulkAction::make(),
                    Tables\Actions\RestoreBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListTransactions::route('/'),
            'create' => Pages\CreateTransaction::route('/create'),
            'view' => Pages\ViewTransaction::route('/{record}'),
            'edit' => Pages\EditTransaction::route('/{record}/edit'),
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ]);
    }
}
