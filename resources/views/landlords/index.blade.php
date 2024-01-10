@extends('layouts.app', ['page' => __('Landlord'), 'pageSlug' => 'notifications'])

@section('content')
<div class="row">
  <div class="col-md-12">
    <div class="card ">
      <div class="card-header">
        <h4 class="card-title">List of Landlords</h4>
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
                  Email
                </th>
                <th>
                  Phone Number
                </th>
                <th>
                  Gender
                </th>
              </tr>
            </thead>
            <tbody>
            @php
              $index = 1;
            @endphp
              @foreach ($documents as $document)
                @if ($document['role'] === 'Landlord')
                <tr>
                    <td>
                      <a href="{{ route('landlord.show', ['id' => $document->id()]) }}">
                        {{ $index }}
                      </a>
                    </td>
                    <td>
                    {{ $document['name']['FirstName'] }} {{ $document['name']['LastName'] }}
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
      <div class="card-body">
        <div class="table-responsive"></div>
      </div>
    </div>
  </div>
</div>
@endsection
