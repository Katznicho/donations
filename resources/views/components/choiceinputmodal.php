<div class="fixed top-0 left-0 w-full h-full bg-opacity-100 z-50 hidden" id="choiceInputModal">
            <div class="relative mx-auto p-4 w-full max-w-md bg-white rounded-lg shadow-md">
                <div class="modal-header flex justify-between items-center">
                    <h5 class="text-xl font-bold leading-tight">Sponsorship Preferences</h5>
                    <button type="button" class="text-gray-400 focus:outline-none hover:text-gray-500"
                        data-bs-dismiss="modal" aria-label="Close">
                        <span class="sr-only">Close</span>
                        <svg aria-hidden="true" class="h-6 w-6" viewBox="0 0 17 17">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M10 14l1-1m4-4l-1-1m0 0l-4-4m1-1-1-1" />
                        </svg>
                    </button>
                </div>
                <div class="modal-body p-4">
                    <form id="choiceInputForm">
                        <div class="mb-4">
                            <label for="numberOfChildren" class="block text-sm font-medium text-gray-700 mb-1">Number of
                                Children:</label>
                            <input type="number" class="form-input border rounded-md w-full" id="numberOfChildren"
                                name="numberOfChildren" min="0" required placeholder="Enter number of children">
                        </div>
                        <div class="mb-4">
                            <label for="preferredGender" class="block text-sm font-medium text-gray-700 mb-1">Preferred
                                Gender:</label>
                            <select class="form-select border rounded-md w-full" id="preferredGender" name="preferredGender"
                                required>
                                <option value="" disabled selected>Select Gender</option>
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                                <option value="any">Any</option>

                            </select>
                        </div>
                        <div class="mb-4">
                            <label for="preferredAgeRange" class="block text-sm font-medium text-gray-700 mb-1">Preferred
                                Age Range:</label>
                            <select class="form-select border rounded-md w-full" id="preferredAgeRange"
                                name="preferredAgeRange" required>
                                <option value="" disabled selected>Select Age Range</option>
                                <option value="0-5">0-5 years</option>
                                <option value="6-12">6-12 years</option>
                                <option value="13-18">13-18 years</option>
                                <option value="19+">19+ years</option>
                            </select>
                        </div>
                        <div class="mb-4">
                            <label for="additionalDetails" class="block text-sm font-medium text-gray-700 mb-1">Additional
                                Details:</label>
                            <textarea class="form-textarea border rounded-md w-full" id="additionalDetails" name="additionalDetails"
                                rows="3" placeholder="Enter additional details"></textarea>
                        </div>
                        <div class="text-center">
                            <button type="submit"
                                class="btn btn-primary inline-flex items-center px-4 py-2 bg-blue-500 text-white font-bold rounded shadow-md hover:bg-blue-700"
                                id="cancelButton">Submit</button>
                        </div>

                        <div>
                        <button type="button"
                class="btn btn-outline-danger mt-2 inline-flex items-center px-4 py-2 bg-black-500 text-black font-bold rounded shadow-md hover:bg-red-700"
                id="cancelButton" onclick="window.location='{{ route('welcome') }}'">Back</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>