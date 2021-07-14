@extends('layouts.app')

@section('content')
<div class="roles-permissions">
    <div class="flex items-center justify-between mb-6">
        <div>
            <h2 class="text-gray-700 uppercase font-bold">Classes</h2>
        </div>
        <div class="flex flex-wrap items-center">
            <a href="{{ route('classes.create') }}" class="bg-gray-200 text-gray-700 text-sm uppercase py-2 px-4 flex items-center rounded">
                <svg class="w-3 h-3 fill-current" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="plus" class="svg-inline--fa fa-plus fa-w-14" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                    <path fill="currentColor" d="M416 208H272V64c0-17.67-14.33-32-32-32h-32c-17.67 0-32 14.33-32 32v144H32c-17.67 0-32 14.33-32 32v32c0 17.67 14.33 32 32 32h144v144c0 17.67 14.33 32 32 32h32c17.67 0 32-14.33 32-32V304h144c17.67 0 32-14.33 32-32v-32c0-17.67-14.33-32-32-32z"></path>
                </svg>
                <span class="ml-2 text-xs font-semibold">Class</span>
            </a>
        </div>
    </div>
   
    <table   id="myTable">
        <thead>
            <td>#</td>
            <td>Name</td>
            <td>Students</td>
            <td>Subject Code</td>
            <td>Teacher</td>
            <td>Action</td>
        </thead>

        @foreach ($classes as $class)


        <tr>
            <td>{{ $class->class_numeric }}</td>
            <td>{{ $class->class_name }}</td>
            <td>
                <span class="bg-gray-200 text-sm mr-1 mb-1 px-2 font-semibold border rounded-full">
                    <!-- {   asd{ $class->students_count }  asd } -->
                       {{ $class->students->count() }}
                </span>
            </td>
            <td>
                @foreach ($class->subjects as $subject)
                <span class="bg-gray-200 text-sm mr-1 mb-1 px-2 font-semibold border rounded-full">{{ $subject->subject_code }}</span>
                @endforeach
            </td>
            <td>{{ $class->teacher->user->name ?? '' }}</td>

            <td class=" flex items-center justify-center px-3 d-flex">
                <a href="{{ route('classes.edit',$class->id) }}">
                    <svg class="h-6 w-6 fill-current text-gray-600" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="pen-square" class="svg-inline--fa fa-pen-square fa-w-14" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                        <path fill="currentColor" d="M400 480H48c-26.5 0-48-21.5-48-48V80c0-26.5 21.5-48 48-48h352c26.5 0 48 21.5 48 48v352c0 26.5-21.5 48-48 48zM238.1 177.9L102.4 313.6l-6.3 57.1c-.8 7.6 5.6 14.1 13.3 13.3l57.1-6.3L302.2 242c2.3-2.3 2.3-6.1 0-8.5L246.7 178c-2.5-2.4-6.3-2.4-8.6-.1zM345 165.1L314.9 135c-9.4-9.4-24.6-9.4-33.9 0l-23.1 23.1c-2.3 2.3-2.3 6.1 0 8.5l55.5 55.5c2.3 2.3 6.1 2.3 8.5 0L345 199c9.3-9.3 9.3-24.5 0-33.9z"></path>
                    </svg>
                </a> 
                <a href="{{ route('class.assign.subject',$class->id) }}" class="ml-1 bg-gray-600 block p-1 border border-gray-600 rounded-sm" title="assign subject">
                    <svg class="h-3 w-3 fill-current text-gray-100" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="align-right" class="svg-inline--fa fa-align-right fa-w-14" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                        <path fill="currentColor" d="M160 84V44c0-8.837 7.163-16 16-16h256c8.837 0 16 7.163 16 16v40c0 8.837-7.163 16-16 16H176c-8.837 0-16-7.163-16-16zM16 228h416c8.837 0 16-7.163 16-16v-40c0-8.837-7.163-16-16-16H16c-8.837 0-16 7.163-16 16v40c0 8.837 7.163 16 16 16zm0 256h416c8.837 0 16-7.163 16-16v-40c0-8.837-7.163-16-16-16H16c-8.837 0-16 7.163-16 16v40c0 8.837 7.163 16 16 16zm160-128h256c8.837 0 16-7.163 16-16v-40c0-8.837-7.163-16-16-16H176c-8.837 0-16 7.163-16 16v40c0 8.837 7.163 16 16 16z"></path>
                    </svg>
                </a>
                <a href="{{ route('classes.destroy',$class->id) }}" data-url="{!! URL::route('classes.destroy',$class->id) !!}" class="deleteclass ml-1 bg-gray-600 block p-1 border border-gray-600 rounded-sm">
                    <svg class="h-3 w-3 fill-current text-gray-100" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="trash" class="svg-inline--fa fa-trash fa-w-14" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                        <path fill="currentColor" d="M432 32H312l-9.4-18.7A24 24 0 0 0 281.1 0H166.8a23.72 23.72 0 0 0-21.4 13.3L136 32H16A16 16 0 0 0 0 48v32a16 16 0 0 0 16 16h416a16 16 0 0 0 16-16V48a16 16 0 0 0-16-16zM53.2 467a48 48 0 0 0 47.9 45h245.8a48 48 0 0 0 47.9-45L416 128H32z"></path>
                    </svg>
                </a>
            </td>
        </tr>
        @endforeach
</div> 
@include('backend.modals.delete',['name' => 'class'])
</div>
@endsection


@push('scripts')
<script>
    $(function() {
        $(".deleteclass").on("click", function(event) {
            event.preventDefault();
            $("#deletemodal").toggleClass("hidden");
            var url = $(this).attr('data-url');
            $(".remove-record").attr("action", url);
        })
 
        $("#deletemodelclose").on("click", function(event) {
            event.preventDefault();
            $("#deletemodal").toggleClass("hidden");
        })
    })
</script>
@endpush
