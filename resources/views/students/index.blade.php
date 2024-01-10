@extends('layouts.app', ['page' => __('Student'), 'pageSlug' => 'tables'])

@section('content')
<div class="row">
  <div class="col-md-12">
    <div class="card ">
      <div class="card-header">
        <h4 class="card-title">List of Students</h4>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table tablesorter " id="">
            <thead class=" text-primary">
              <tr>
                <th>
                  No
                </th>
                <th>
                  Name
                </th>
                <th>
                  Student ID
                </th>
                <th>
                  Email
                </th>
                <th>
                  Phone Number
                </th>
                <th>
                  Gender
                </th>
                <th>
                  Rent Status
                </th>
              </tr>
            </thead>
            <tbody>
            @php
              $index = 1;
            @endphp
            @foreach ($documents as $document)
              @if ($document['role'] === 'Student')
                  <tr>
                      <td>
                        <a href="{{ route('student.show', ['id' => $document->id()]) }}">
                          {{ $index }}
                        </a>
                      </td>
                      <td>
                          {{ $document['name']['FirstName'] }} {{ $document['name']['LastName'] }}
                      </td>
                      <td>
                          {{ $document['Student ID'] }}
                      </td>
                      <td>
                          {{ $document['email'] }}
                      </td>
                      <td>
                          {{ $document['phoneNumber'] }}
                      </td>
                      <td>
                          {{ $document['gender'] }}
                      </td>
                      <td>
                        @if ($document['haveRent'] === true)
                          Renting
                        @elseif ($document['haveRent'] === false)
                          Not Renting
                        @endif
                      </td>
                  </tr>
              @php
                $index++;
              @endphp
              @endif
            @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
  <div class="col-md-12">
    <div class="card  card-plain">
    <div class="card-header">
        @php
          $m = 0;
          $f = 0;
        @endphp
        @foreach ($documents as $document)
        @if ($document['role'] === 'Student' && $document['haveRent'] === false)
          @if ($document['gender'] === 'Male')
            @php
              $m++;
            @endphp
          @elseif ($document['gender'] === 'Female')
            @php
              $f++;
            @endphp
          @endif
        @endif
        @endforeach
        <h4 class="card-title"> There are a total of {{ $m }} male student(s) that does not rent a house yet</h4>
        <h4 class="card-title"> There are a total of {{ $f }} female student(s) that does not rent a house yet</h4>
      </div>
      <div class="card-body">
        <div class="table-responsive"></div>
      </div>
    </div>
  </div>
</div>
@endsection
