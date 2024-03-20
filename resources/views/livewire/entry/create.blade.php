<x-slot:title>Register</x-slot>
<div>
    <div class="text-center">
        <h1 class="text-4xl font-bold tracking-tight text-gray-900 sm:text-6xl">Register Forum</h1>
        <p class="mt-6 text-lg leading-8 text-gray-600">Nullam maximus lobortis ultricies. Vestibulum risus velit.</p>
    </div>
    <ol class="items-center w-full mt-16 space-y-4 sm:flex sm:space-x-8 sm:space-y-0">
        @foreach ($stepsInfo as $stepNum => $step)
            <li wire:key="step{{ $stepNum }}"
                class="flex items-center space-x-2.5 {{ $currentStep === $stepNum ? 'text-indigo-600' : 'text-gray-500' }}">
                <span
                    class="flex items-center justify-center w-8 h-8 border rounded-full shrink-0 {{ $currentStep === $stepNum ? 'border-indigo-600' : 'border-gray-500' }}">
                    {{ $stepNum }}
                </span>
                <span>
                    <h3 class="font-medium leading-tight">{{ $step['title'] }}</h3>
                    <p class="text-sm">{{ $step['description'] }}</p>
                </span>
            </li>
        @endforeach
    </ol>
    <form wire:submit="save" class="mx-auto mt-16 max-w-xl sm:mt-8">
        <div class="grid grid-cols-1 gap-x-8 gap-y-6 sm:grid-cols-2 @if ($currentStep !== 1) hidden @endif">
            <div>
                <label for="firstName" class="block text-sm font-semibold leading-6 text-gray-900">First name</label>
                <div class="mt-2.5">
                    <input type="text" name="firstName" id="firstName" wire:model="form.firstName"
                        class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 sm:leading-6">
                </div>
                <div class="text-red-700">
                    @error('form.firstName')
                        {{ $message }}
                    @enderror
                </div>
            </div>
            <div>
                <label for="lastName" class="block text-sm font-semibold leading-6 text-gray-900">Last name</label>
                <div class="mt-2.5">
                    <input type="text" name="lastName" id="lastName" wire:model="form.lastName"
                        class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 sm:leading-6">
                </div>
                <div class="text-red-700">
                    @error('form.lastName')
                        {{ $message }}
                    @enderror
                </div>
            </div>
            <div class="sm:col-span-2">
                <label for="address" class="block text-sm font-semibold leading-6 text-gray-900">Address</label>
                <div class="mt-2.5">
                    <input type="text" name="address" id="address" wire:model="form.address"
                        class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 sm:leading-6">
                </div>
                <div class="text-red-700">
                    @error('form.address')
                        {{ $message }}
                    @enderror
                </div>
            </div>
            <div class="sm:col-span-2">
                <label for="city" class="block text-sm font-semibold leading-6 text-gray-900">City</label>
                <div class="mt-2.5">
                    <input type="text" name="city" id="city" wire:model="form.city"
                        class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 sm:leading-6">
                </div>
                <div class="text-red-700">
                    @error('form.city')
                        {{ $message }}
                    @enderror
                </div>
            </div>

            <div class="sm:col-span-2">
                <label for="country" class="block text-sm font-semibold leading-6 text-gray-900">Country</label>
                <select id="country" name="country" wire:model="form.country"
                    class="block w-full h-10 rounded-md border-0 bg-transparent bg-none py-0 pl-4 pr-9 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300">
                    <option value="">Choose Country</option>
                    <option value="us">US</option>
                    <option value="ca">CA</option>
                    <option value="gb">GB</option>
                </select>
                <div class="text-red-700">
                    @error('form.country')
                        {{ $message }}
                    @enderror
                </div>
            </div>
            <div class="w-full sm:col-span-2">
                <p class="mt-4 mb-4">Birthdate</p>
                <hr class="mb-4" />
                <div class="w-full flex">
                    <div class="w-1/3 mr-2">
                        <label for="bMonth" class="block text-sm font-semibold leading-6 text-gray-900">Month</label>
                        <select id="bMonth" name="bMonth" wire:model="form.bMonth"
                            class="block w-full h-10 rounded-md border-0 bg-transparent bg-none py-0 pl-4 pr-9 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300">
                            <option value="">Birth Month</option>
                            @foreach (range(1, 12) as $month)
                                <option value="{{ $month }}">
                                    {{ date('M', strtotime('2016-' . $month)) }}
                                </option>
                            @endforeach
                        </select>
                        <div class="text-red-700">
                            @error('form.bMonth')
                                {{ $message }}
                            @enderror
                        </div>
                    </div>
                    <div class="w-1/3 mr-2">
                        <label for="bDay" class="block text-sm font-semibold leading-6 text-gray-900">Day</label>
                        <select id="bDay" name="bDay" wire:model="form.bDay"
                            class="block w-full h-10 rounded-md border-0 bg-transparent bg-none py-0 pl-4 pr-9 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300">
                            <option value="">Birth Day</option>
                            @foreach (range(1, 31) as $day)
                                <option value="{{ strlen($day) == 1 ? '0' . $day : $day }}">
                                    {{ strlen($day) == 1 ? '0' . $day : $day }}
                                </option>
                            @endforeach
                        </select>
                        <div class="text-red-700">
                            @error('form.bDay')
                                {{ $message }}
                            @enderror
                        </div>
                    </div>
                    <div class="w-1/3">
                        <label for="bYear" class="block text-sm font-semibold leading-6 text-gray-900">Year</label>
                        <select id="bYear" name="bYear" wire:model="form.bYear"
                            class="block w-full h-10 rounded-md border-0 bg-transparent bg-none py-0 pl-4 pr-9 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300">
                            <option value="">Birth Year</option>
                            @for ($year = date('Y'); $year > date('Y') - 100; $year--)
                                <option value="{{ $year }}">
                                    {{ $year }}
                                </option>
                            @endfor
                        </select>
                        <div class="text-red-700">
                            @error('form.bYear')
                                {{ $message }}
                            @enderror
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <div class="@if ($currentStep !== 2) hidden @endif">
            <div class="block w-full">
                <label for="isMarried" onclick="toggleMarriageSection()"
                    class="relative flex justify-between items-center group p-2 text-xl">
                    Are you currently married?
                    <input type="checkbox" name="isMarried" id="isMarried" wire:model="form.isMarried"
                        class="absolute left-1/2 -translate-x-1/2 w-full h-full peer appearance-none rounded-md" />
                    <span
                        class="w-16 h-10 flex items-center flex-shrink-0 ml-4 p-1 bg-gray-300 rounded-full duration-300 ease-in-out peer-checked:bg-green-400 after:w-8 after:h-8 after:bg-white after:rounded-full after:shadow-md after:duration-300 peer-checked:after:translate-x-6 group-hover:after:translate-x-1"></span>
                </label>
            </div>
            <div id="marriageStatus" class="@if (!$form->isMarried) hidden @endif">
                <div class="w-full sm:col-span-2">
                    <p class="mt-4 mb-4">Marriage Date</p>
                    <hr class="mb-4" />
                    <div class="w-full flex">
                        <div class="w-1/3 mr-2">
                            <label for="mMonth"
                                class="block text-sm font-semibold leading-6 text-gray-900">Month</label>
                            <select id="mMonth" name="mMonth" wire:model="form.mMonth"
                                class="block w-full h-10 rounded-md border-0 bg-transparent bg-none py-0 pl-4 pr-9 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300">
                                <option value="">Marriage Month</option>
                                @foreach (range(1, 12) as $month)
                                    <option value="{{ $month }}">
                                        {{ date('M', strtotime('2016-' . $month)) }}
                                    </option>
                                @endforeach
                            </select>
                            <div class="text-red-700">
                                @error('form.mMonth')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>
                        <div class="w-1/3 mr-2">
                            <label for="mDay"
                                class="block text-sm font-semibold leading-6 text-gray-900">Day</label>
                            <select id="mDay" name="mDay" wire:model="form.mDay"
                                class="block w-full h-10 rounded-md border-0 bg-transparent bg-none py-0 pl-4 pr-9 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300">
                                <option value="">Marriage Day</option>
                                @foreach (range(1, 31) as $day)
                                    <option value="{{ strlen($day) == 1 ? '0' . $day : $day }}">
                                        {{ strlen($day) == 1 ? '0' . $day : $day }}
                                    </option>
                                @endforeach
                            </select>
                            <div class="text-red-700">
                                @error('form.mDay')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>
                        <div class="w-1/3">
                            <label for="mYear"
                                class="block text-sm font-semibold leading-6 text-gray-900">Year</label>
                            <select id="bYear" name="mYear" wire:model="form.mYear"
                                class="block w-full h-10 rounded-md border-0 bg-transparent bg-none py-0 pl-4 pr-9 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300">
                                <option value="">Marriage Year</option>
                                @for ($year = date('Y'); $year > date('Y') - 100; $year--)
                                    <option value="{{ $year }}">
                                        {{ $year }}
                                    </option>
                                @endfor
                            </select>
                            <div class="text-red-700">
                                @error('form.mYear')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="mt-4 sm:col-span-2">
                        <label for="marriageCountry" class="block text-sm font-semibold leading-6 text-gray-900">Country
                            Where Marriage Occured</label>
                        <select id="marriageCountry" name="marriageCountry" wire:model="form.marriageCountry"
                            class="block w-full h-10 rounded-md border-0 bg-transparent bg-none py-0 pl-4 pr-9 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300">
                            <option value="">Choose Country</option>
                            <option value="us">US</option>
                            <option value="ca">CA</option>
                            <option value="gb">GB</option>
                        </select>
                        <div class="text-red-700">
                            @error('form.marriageCountry')
                                {{ $message }}
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
            <div id="otherStatus" class="@if ($form->isMarried) hidden @endif">
                <div class="block w-full">
                    <label for="isWidowed" class="relative flex justify-between items-center group p-2 text-xl">
                        Are you a widow?
                        <input type="checkbox" name="isWidowed" id="isWidowed" wire:model="form.isWidowed"
                            class="absolute left-1/2 -translate-x-1/2 w-full h-full peer appearance-none rounded-md" />
                        <span
                            class="w-16 h-10 flex items-center flex-shrink-0 ml-4 p-1 bg-gray-300 rounded-full duration-300 ease-in-out peer-checked:bg-green-400 after:w-8 after:h-8 after:bg-white after:rounded-full after:shadow-md after:duration-300 peer-checked:after:translate-x-6 group-hover:after:translate-x-1"></span>
                    </label>
                    <div class="text-red-700">
                        @error('form.isWidowed')
                            {{ $message }}
                        @enderror
                    </div>
                </div>
                <div class="block w-full">
                    <label for="isSeparated" class="relative flex justify-between items-center group p-2 text-xl">
                        Have you been married and are currently separated?
                        <input type="checkbox" name="isSeparated" id="isSeparated" wire:model="form.isSeparated"
                            class="absolute left-1/2 -translate-x-1/2 w-full h-full peer appearance-none rounded-md" />
                        <span
                            class="w-16 h-10 flex items-center flex-shrink-0 ml-4 p-1 bg-gray-300 rounded-full duration-300 ease-in-out peer-checked:bg-green-400 after:w-8 after:h-8 after:bg-white after:rounded-full after:shadow-md after:duration-300 peer-checked:after:translate-x-6 group-hover:after:translate-x-1"></span>
                    </label>
                    <div class="text-red-700">
                        @error('form.isSeparated')
                            {{ $message }}
                        @enderror
                    </div>
                </div>
            </div>
        </div>

        <div class="mt-10" wire:loading.remove>
            @if ($currentStep === count($stepsInfo))
                <button type="button" wire:click="prevStep"
                    class="block w-40 float-left rounded-md bg-indigo-600 px-3.5 py-2.5 text-center text-sm font-semibold text-white shadow-sm hover:bg-indigo-500">Previous</button>
                <button type="submit"
                    class="block w-40 float-right rounded-md bg-indigo-600 px-3.5 py-2.5 text-center text-sm font-semibold text-white shadow-sm hover:bg-indigo-500">Submit</button>
            @elseif ($currentStep > 1)
                <button type="button" wire:click="prevStep"
                    class="block w-40 float-left rounded-md bg-indigo-600 px-3.5 py-2.5 text-center text-sm font-semibold text-white shadow-sm hover:bg-indigo-500">Previous</button>
                <button type="button" wire:click="nextStep"
                    class="block w-40 float-right rounded-md bg-indigo-600 px-3.5 py-2.5 text-center text-sm font-semibold text-white shadow-sm hover:bg-indigo-500">Next</button>
            @else
                <button type="button" wire:click="nextStep"
                    class="block w-40 float-right rounded-md bg-indigo-600 px-3.5 py-2.5 text-center text-sm font-semibold text-white shadow-sm hover:bg-indigo-500">Next</button>
            @endif
        </div>
        <div class="mt-10 text-center" wire:loading>
            <div role="status">
                <svg aria-hidden="true" class="w-8 h-8 text-gray-200 animate-spin dark:text-gray-600 fill-blue-600"
                    viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z"
                        fill="currentColor" />
                    <path
                        d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z"
                        fill="currentFill" />
                </svg>
            </div>
        </div>
    </form>
    <script>
        function toggleMarriageSection() {
            var marriageStatusSection = document.getElementById('marriageStatus'),
                otherStatusSection = document.getElementById('otherStatus'),
                showSection = document.getElementById('isMarried').checked;

            if (showSection) {
                marriageStatusSection.classList.remove("hidden");
                otherStatusSection.classList.add("hidden");
            } else {
                otherStatusSection.classList.remove("hidden");
                marriageStatusSection.classList.add("hidden");
            }
        }
    </script>
</div>
