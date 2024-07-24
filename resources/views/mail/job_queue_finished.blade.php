<x-mail::message>
# Jobs (batch {{$batchId}}) finished {{$success ? 'Successfully' : 'Failed'}}

<x-mail::button :url="route('home')">
Button Text
</x-mail::button>
</x-mail::message>
