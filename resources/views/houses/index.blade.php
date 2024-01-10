@extends('layouts.app', ['page' => __('House'), 'pageSlug' => 'rumah'])

@section('content')
<div class="row">
  <div class="col-md-12">
    <div class="card ">
      <div class="card-header">
        <h4 class="card-title">List of Houses</h4>
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
                  ID
                </th>
                <th>
                  Name
                </th>
                <th>
                  District
                </th>
                <th>
                  Price
                </th>
                <th>
                  Type
                </th>
              </tr>
            </thead>
            <tbody>
              @foreach ($documents as $index => $document)
              <tr>
                <td>
                  <a href="{{ route('house.show', ['id' => $document->id()]) }}">
                    {{ $loop->index + 1 }}
                  </a>
                </td>
                <td>
                {{ $document->id() }}
                </td>
                <td>
                {{ $document['name'] }}
                </td>
                <td>
                {{ $document['district'] }}
                </td>
                <td>
                {{ $document['price'] }}
                </td>
                <td>
                {{ $document['type'] }}
                </td>
              </tr>
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
        @if ($document['preffered gender'] === 'Male')
          @php
            $m += $document['quota'];
          @endphp
        @elseif ($document['preffered gender'] === 'Female')
          @php
            $f += $document['quota'];
          @endphp
        @endif
        @endforeach
        <h4 class="card-title"> There are a total of {{ $m }} quota(s) left for male student</h4>
        <h4 class="card-title"> There are a total of {{ $f }} quota(s) left for female student</h4>
      </div>
      <div class="card-body">
        <div class="table-responsive"></div>
      </div>
    </div>
  </div>
</div>
@endsection
