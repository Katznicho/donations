<div class="fixed top-0 left-0 w-full h-full  bg-opacity-100 z-50 hidden" id="confirmationModal">
    <div class="relative mx-auto p-4 w-full max-w-sm bg-white rounded-lg shadow-md">
        <div class="modal-header flex justify-between items-center text-center">
            <h5 class="text-xl font-bold text-center leading-tight">Donation Options</h5>
            <button type="button" class="text-gray-400 focus:outline-none hover:text-gray-500" data-bs-dismiss="modal"
                aria-label="Close">
                <span class="sr-only">Close</span>
                <svg aria-hidden="true" class="h-6 w-6" viewBox="0 0 17 17">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M10 14l1-1m4-4l-1-1m0 0l-4-4m1-1-1-1" />
                </svg>
            </button>
        </div>
        <div class="modal-body text-center p-4">
            <p>Would you like us to choose a sponsorship option for you, or would you prefer to select one yourself?
            </p>
            <div class="flex justify-center gap-2">
                <button type="button"
                    class="btn btn-primary inline-flex items-center px-4 py-2 bg-blue-500 text-white font-bold rounded shadow-md hover:bg-blue-700"
                    id="pickForMeButton">Pick for Me</button>
                <button type="button"
                    class="btn btn-outline-primary inline-flex items-center px-4 py-2 bg-blue-500 text-white font-bold rounded shadow-md hover:bg-blue-700"
                    id="pickMyselfButton" onclick="window.location='{{ route('welcome') }}'">
                    I'll Pick Myself
                </button>

            </div>
            <!-- Cancel button -->
            <button type="button"
                class="btn btn-outline-danger mt-2 inline-flex items-center px-4 py-2 bg-black-500 text-black font-bold rounded shadow-md hover:bg-red-700"
                id="cancelButton">Cancel</button>
        </div>
    </div>
</div>