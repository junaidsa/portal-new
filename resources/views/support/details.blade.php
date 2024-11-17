@extends('layouts.app')
@section('main')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <h5 class="card-header">Support Details</h5>
                    <div class="card-body pb-0">
                        <ul class="timeline mt-3 mb-0">
                            <li class="timeline-item timeline-item-primary pb-4 border-left-dashed">
                                <span class="timeline-indicator timeline-indicator-primary">
                                    <i class="ti ti-send"></i>
                                </span>
                                <div class="timeline-event">
                                    <div class="timeline-header border-bottom mb-3">
                                        <h6 class="mb-0">{{ $support->title }}</h6>
                                        <span class="text-muted">{{ @$support->user->name }} ( {{ @$support->user->role }}
                                            )</span>
                                    </div>
                                    <div class="d-flex justify-content-between flex-wrap mb-2">
                                        <div>
                                            {{ $support->remarks }}
                                        </div>
                                        <hr>
                                        <div>
                                            {{ \Carbon\Carbon::parse($support->created_at)->format('jS F') . ' ' . $support->created_at->format('g:i A') }}
                                        </div>
                                    </div>
                                    <a href="{{ url('support/create/' . $support->id) }}">
                                        <i class="ti ti-send">Reply</i>
                                    </a>
                                </div>
                            </li>
                            @foreach ($support->parent as $parent)
                                <li class="timeline-item timeline-item-primary pb-4 border-left-dashed">
                                    <span class="timeline-indicator timeline-indicator-primary">
                                        <i class="ti ti-send"></i>
                                    </span>
                                    <div class="timeline-event">
                                        <div class="timeline-header border-bottom mb-3">
                                            <h6 class="mb-0"></h6>
                                            <span class="text-muted">{{ $parent->user->name }} ( {{ $parent->user->role }}
                                                )</span>
                                        </div>
                                        <div class="d-flex justify-content-between flex-wrap mb-2">
                                            <div>
                                                {{ $parent->remarks }}
                                            </div>
                                            <hr>
                                            <div>
                                                {{ \Carbon\Carbon::parse($parent->created_at)->format('jS F') . ' ' . $parent->created_at->format('g:i A') }}
                                            </div>
                                        </div>
                                        <a href="{{ url('support/create/' . $support->id) }}">
                                            <i class="ti ti-send">Reply</i>
                                        </a>
                                    </div>
                                </li>
                            @endforeach


                        </ul>
                    </div>
                </div>
            </div>
            <!-- /Timeline Advanced-->
        </div>
    @endsection
