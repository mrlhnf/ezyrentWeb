@extends('layouts.app')

@section('content')
<div class="col-md-12">
    <div class="card card-plain">
        <div class="card-header">
            <h4 class="card-title">House Rental Application</h4>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table tablesorter" id="">
                    <thead class="text-primary">
                        <tr>
                            <th>No</th>
                            <th>ID</th>
                            <th>Name</th>
                            <th>District</th>
                            <th>Price</th>
                            <th>Type</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                    @php
                      $index = 1;
                    @endphp
                        @foreach ($documents1 as $document)
                          @if ($document['status'] === false)
                          <tr>
                              <td>
                                  <a href="{{ route('house.show', ['id' => $document->id()]) }}">
                                    {{ $index }}
                                  </a>
                              </td>
                              <td>{{ $document->id() }}</td>
                              <td>{{ $document['name'] }}</td>
                              <td>{{ $document['district'] }}</td>
                              <td>{{ $document['price'] }}</td>
                              <td>{{ $document['type'] }}</td>
                              <td class="td-actions">
                                  <a href="{{ route('house.approve', ['id' => $document->id()]) }}"
                                      type="button" rel="tooltip"
                                      class="btn btn-success btn-sm btn-round btn-icon">
                                      <i class="tim-icons icon-check-2"></i>
                                  </a>
                                  <a href="{{ route('house.reject', ['id' => $document->id()]) }}"
                                      type="button" rel="tooltip"
                                      class="btn btn-danger btn-sm btn-round btn-icon">
                                      <i class="tim-icons icon-simple-remove"></i>
                                  </a>
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

    <div class="card card-plain">
        <div class="card-header">
            <h4 class="card-title">Transaction Review</h4>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table tablesorter" id="">
                    <thead class="text-primary">
                        <tr>
                            <th>No</th>
                            <th>Transaction ID</th>
                            <th>To</th>
                            <th>From</th>
                            <th>Amount</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                    @php
                      $index = 1;
                    @endphp
                        @foreach ($documents2 as $document)
                          @if ($document['status'] === false)
                          <tr>
                              <td>{{ $index }}</td>
                              <td>
                                {{ $document->id() }}
                                <a href="{{ route('transaction.receipt', ['id' => $document->id()]) }}" style="display: inline;">
                                    <i class="fas fa-file-image"></i>
                                </a>
                              </td>
                              <td>{{ $document['receiver'] }}</td>
                              <td>{{ $document['sender'] }}</td>
                              <td>RM{{ $document['amount'] }}</td>
                              <td class="td-actions">
                                    <a href="{{ route('transaction.approve', ['id' => $document->id()]) }}"
                                      type="button" rel="tooltip"
                                      class="btn btn-success btn-sm btn-round btn-icon">
                                      <i class="tim-icons icon-check-2"></i>
                                  </a>
                                  <a href="{{ route('transaction.reject', ['id' => $document->id()]) }}"
                                      type="button" rel="tooltip"
                                      class="btn btn-danger btn-sm btn-round btn-icon">
                                      <i class="tim-icons icon-simple-remove"></i>
                                  </a>
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
@endsection
