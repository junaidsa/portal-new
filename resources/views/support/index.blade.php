@extends('layouts.app')
@section('main')
              <!-- Project Cards -->
              <div class="container-xxl flex-grow-1 container-p-y">
              <div class="row g-4">
                <div class="col-xl-4 col-lg-6 col-md-6">
                  <div class="card">
                    <div class="card-header">
                      <div class="d-flex align-items-start">
                        <div class="d-flex align-items-start">
                          <div class="avatar me-2">
                            <img
                              src="{{asset('public')}}/assets/img/icons/brands/social-label.png"
                              alt="Avatar"
                              class="rounded-circle"
                            />
                          </div>
                          <div class="me-2 ms-1">
                            <h5 class="mb-0">
                              <a href="javascript:;" class="stretched-link text-body">Social Banners</a>
                            </h5>
                            <div class="client-info">
                              <strong>Client: </strong><span class="text-muted">Christian Jimenez</span>
                            </div>
                          </div>
                        </div>
                        <div class="ms-auto">
                          <div class="dropdown zindex-2">
                            <button
                              type="button"
                              class="btn dropdown-toggle hide-arrow p-0"
                              data-bs-toggle="dropdown"
                              aria-expanded="false"
                            >
                              <i class="ti ti-dots-vertical text-muted"></i>
                            </button>
                            <ul class="dropdown-menu dropdown-menu-end">
                              <li><a class="dropdown-item" href="javascript:void(0);">Rename project</a></li>
                              <li><a class="dropdown-item" href="javascript:void(0);">View details</a></li>
                              <li><a class="dropdown-item" href="javascript:void(0);">Add to favorites</a></li>
                              <li>
                                <hr class="dropdown-divider" />
                              </li>
                              <li><a class="dropdown-item text-danger" href="javascript:void(0);">Leave Project</a></li>
                            </ul>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="card-body">
                      <div class="d-flex align-items-center flex-wrap">
                        <div class="bg-lighter px-3 py-2 rounded me-auto mb-3">
                          <h6 class="mb-0">$24.8k <span class="text-body fw-normal">/ $18.2k</span></h6>
                          <span>Total Budget</span>
                        </div>
                        <div class="text-end mb-3">
                          <h6 class="mb-0">Start Date: <span class="text-body fw-normal">14/2/21</span></h6>
                          <h6 class="mb-1">Deadline: <span class="text-body fw-normal">28/2/22</span></h6>
                        </div>
                      </div>
                      <p class="mb-0">We are Consulting, Software Development and Web Development Services.</p>
                    </div>
                    <div class="card-body border-top">
                      <div class="d-flex align-items-center mb-3">
                        <h6 class="mb-1">All Hours: <span class="text-body fw-normal">380/244</span></h6>
                        <span class="badge bg-label-success ms-auto">28 Days left</span>
                      </div>
                      <div class="d-flex justify-content-between align-items-center mb-2 pb-1">
                        <small>Task: 290/344</small>
                        <small>95% Completed</small>
                      </div>
                      <div class="progress mb-2" style="height: 8px">
                        <div
                          class="progress-bar"
                          role="progressbar"
                          style="width: 95%"
                          aria-valuenow="95"
                          aria-valuemin="0"
                          aria-valuemax="100"
                        ></div>
                      </div>
                      <div class="d-flex align-items-center pt-1">
                        <div class="d-flex align-items-center">
                          <ul class="list-unstyled d-flex align-items-center avatar-group mb-0 zindex-2 mt-1">
                            <li
                              data-bs-toggle="tooltip"
                              data-popup="tooltip-custom"
                              data-bs-placement="top"
                              title="Vinnie Mostowy"
                              class="avatar avatar-sm pull-up"
                            >
                              <img class="rounded-circle" src="{{asset('public')}}/assets/img/avatars/5.png" alt="Avatar" />
                            </li>
                            <li
                              data-bs-toggle="tooltip"
                              data-popup="tooltip-custom"
                              data-bs-placement="top"
                              title="Allen Rieske"
                              class="avatar avatar-sm pull-up"
                            >
                              <img class="rounded-circle" src="{{asset('public')}}/assets/img/avatars/12.png" alt="Avatar" />
                            </li>
                            <li
                              data-bs-toggle="tooltip"
                              data-popup="tooltip-custom"
                              data-bs-placement="top"
                              title="Julee Rossignol"
                              class="avatar avatar-sm pull-up me-2"
                            >
                              <img class="rounded-circle" src="{{asset('public')}}/assets/img/avatars/6.png" alt="Avatar" />
                            </li>
                            <li><small class="text-muted">280 Members</small></li>
                          </ul>
                        </div>
                        <div class="ms-auto">
                          <a href="javascript:void(0);" class="text-body"
                            ><i class="ti ti-message-dots ti-sm"></i> 15</a
                          >
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              </div>
              <!--/ Project Cards -->
              @endsection