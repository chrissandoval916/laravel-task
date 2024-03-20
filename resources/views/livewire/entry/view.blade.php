<x-slot:title>Entry # {{ $entry->id }}</x-slot>
<div class="text-center">
    <h3 class="mb-4 font-bold tracking-tight text-gray-900">Entry Information:</h3>
    <div>
        <h2 class="mb-4">Entry # {{ $entry->id }}</h2>
        <ul class="text-left">
            <li>First Name: {{ $entry->first_name }}</li>
            <li>Last Name: {{ $entry->last_name }}</li>
            <li>Address: {{ $entry->address }}</li>
            <li>City: {{ $entry->city }}</li>
            <li>Country: {{ $entry->country }}</li>
            <li>Birthdate: {{ $entry->birthdate }}</li>
            <li>Is Married: {{ $entry->is_married == 1 ? 'Yes' : 'No' }}</li>
            <li>Marriage Date: {{ $entry->marriage_date }}</li>
            <li>Marriage Country: {{ $entry->marriage_country }}</li>
            <li>Is a Widow: {{ $entry->is_widowed == 1 ? 'Yes' : 'No'  }}</li>
            <li>Is Separated: {{ $entry->is_separated == 1 ? 'Yes' : 'No'  }}</li>
        </ul>
    </div>
</div>
