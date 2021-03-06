<div>
    <div class="widget-content searchable-container list">

        <div class="row">
            <div class="col-xl-4 col-lg-5 col-md-5 col-sm-7 filtered-list-search layout-spacing align-self-center">
                <form class="form-inline my-2 my-lg-0">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="feather feather-search">
                            <circle cx="11" cy="11" r="8"></circle>
                            <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                        </svg>
                        <input type="text" wire:model="search" class="form-control product-search" id="input-search"
                            placeholder="Search User...">
                    </div>
                </form>
            </div>

            <div
                class="col-xl-8 col-lg-7 col-md-7 col-sm-5 text-sm-center text-center layout-spacing align-self-center">
                <div class="d-flex justify-content-sm-end justify-content-center">
                    <svg id="btn-add-contact" data-toggle="modal" data-target=".user_add_modal"
                        xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="feather feather-user-plus">
                        <path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                        <circle cx="8.5" cy="7" r="4"></circle>
                        <line x1="20" y1="8" x2="20" y2="14"></line>
                        <line x1="23" y1="11" x2="17" y2="11"></line>
                    </svg>

                    <div class="switch align-self-center mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="feather feather-list view-list active-view">
                            <line x1="8" y1="6" x2="21" y2="6"></line>
                            <line x1="8" y1="12" x2="21" y2="12"></line>
                            <line x1="8" y1="18" x2="21" y2="18"></line>
                            <line x1="3" y1="6" x2="3" y2="6"></line>
                            <line x1="3" y1="12" x2="3" y2="12"></line>
                            <line x1="3" y1="18" x2="3" y2="18"></line>
                        </svg>
                    </div>
                    <div class="switch align-self-center ml-4 mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="feather feather-grid view-grid">
                            <rect x="3" y="3" width="7" height="7"></rect>
                            <rect x="14" y="3" width="7" height="7"></rect>
                            <rect x="14" y="14" width="7" height="7"></rect>
                            <rect x="3" y="14" width="7" height="7"></rect>
                        </svg>
                    </div>
                </div>



            </div>
        </div>
        <!-- Modal -->
        <div class="modal  fade user_add_modal" wire:ignore.self tabindex="-1" role="dialog"
            aria-labelledby="addContactModalTitle" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <h2 class="text-center">Add Agent</h2>
                        <i class="flaticon-cancel-12 close" data-dismiss="modal"></i>
                        <div class="add-contact-box">
                            <div class="add-contact-content">
                                <form id="addContactModalTitle">
                                    <div class="row">

                                        <div class="col-md-12">
                                            <div class="contact-email">
                                                <i class="flaticon-mail-26"></i>

                                                <input type="text" wire:model.defer="phone_number"
                                                    class="form-control @error('phone_number')is-invalid  @enderror"
                                                    placeholder="Phone Number">
                                                    @error('phone_number') <span class="text-danger " >{{ $message }}</span> @enderror
                                            </div>
                                        </div>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button id="btn-edit" wire:click="addAgent" class="float-left btn">


                            <span style="width: 25px; height:25px" wire:loading wire:target="addAgent"
                                class="spinner-border text-white mr-2 align-self-center loader-sm "></span>
                            <span wire:loading.class="display-none">Save</span>
                        </button>

                        <button class="btn" data-dismiss="modal"> <i class="flaticon-delete-1"></i>
                            Discard</button>

                    </div>
                </div>
            </div>
        </div>




        <div id="tableSimple" class="col-lg-12 col-12 layout-spacing">
            <div class="statbox widget box box-shadow">
                <div class="widget-header">
                    <div class="row">
                        <div class="col-xl-12 col-md-12 col-sm-12 col-12">

                            <button wire:click="lastMonth()"id="report2"  onclick="today()" class="btn btn-primary"> Last Month</button> {{ $users->count() }}
                        </div>
                    </div>
                </div>
                <div class="widget-content widget-content-area" id="report">
                    <div class="table-responsive">
                       @if ($isLastMonth)
                       <table class="table table-bordered table-hover  mb-4">
                            <thead>
                                <tr>
                                    <th>Agent Info</th>
                                    <th>Bank Info.</th>


                                    <th class="text-center">Last Month</th>
                                    <th>Status</th>
                                    <th>Total Revenue </th>
                                </tr>
                            </thead>


                            <tbody>
                                @foreach($users as $user)
@if($user->checkSub($user->id))
                                    <tr>
                                        <td style="width:15rem;">
                                            <div class="user-profile row">
                                                <div class="col-sm-4">

                                                    @if($user->photo != null)
                                                        <img src="{{ asset($user->photo) }}"
                                                            style="width: 60px; height: 60px; border-radius:10px;"
                                                            alt="avatar">
                                                    @else
                                                        <div class="avatar avatar-xl " style="margin-left:0rem;">
                                                            <span class="avatar-title">
                                                                <?php
$position = strpos($user->full_name, ' ');
if ($position != 0) {
    echo substr($user->full_name, 0, 1);
}

?>
                                                         </span>
                                                        </div>
                                                    @endif
                                                </div>

                                                <div class="col-sm-8">
                                                    <div class="user-meta-info">
                                                        <p class="user-name" data-name="Susan">{{ $user->full_name }}
                                                        </p>
                                                        <span
                                                            class="badge outline-badge-secondary">{{ $user->phone_number }}</span>
                                                    </div>
                                                </div>


                                            </div>
                                        </td>
                                        <td>
                                                    <span class="badge badge-warning"> {{ $user->bank_type }} </span>

                                                        <p> {{ $user->account_type }} </p>
                                                    </td>

                                        <td>
                                            <p class="user-name" data-name="Susan">
                                                <span class="badge badge-pills badge-primary">
                                                    {{ round($user->lastMonthtotalSub($user->id), 3) }} -subscriber</span>
                                            </p>
                                            <span
                                                class="badge outline-badge-danger">{{round( $user->lastMonthtotal11($user->id), 3) }}-
                                                birr</span>
                                            </span>

                                        </td>
                                        <td class="text-center"><span class="text-info">
                                            @if($user->statusCheck($user->id) == "Pending")
                                        <button wire:click="ApprovePayment({{$user->id}})" class="btn btn-success mb-2">Pending</button>
                                        @elseif ($user->statusCheck($user->id) == "Approved")
                                        <button wire:click="UpprovePayment({{$user->id}})" class="btn btn-primary mb-2">Approved</button>
                                        @elseif ($user->statusCheck($user->id) == "Unpproved")
                                        <button wire:click="ApprovePayment({{$user->id}})" class="btn btn-danger mb-2">Unpproved</button>
                                        @endif
                                        </td>
                                        <td class="text-center">

                                            <span class="badge badge-success"> {{ $user->totalSub($user->id) }}
                                            </span>
                                            <span class="badge badge-danger"> {{ round(  $user->total11($user->id), 3) }}    -
                                                birr </span>

                                        </td>
                                    </tr>
                                    @endif
                                @endforeach

                            </tbody>

                        </table>

                       @else <table class="table table-bordered table-hover  mb-4">
                            <thead>
                                <tr>
                                    <th>Agent Info</th>
                                    <th>Bank Info.</th>
                                    <th>Today</th>
                                    <th>This Week</th>
                                    <th class="text-center">This Month</th>
                                    <th>Revenue </th>
                                </tr>
                            </thead>


                            <tbody>
                                @foreach($users as $user)

                                    <tr>
                                        <td style="width:15rem;">
                                            <div class="user-profile row">
                                                <div class="col-sm-4">

                                                    @if($user->photo != null)
                                                        <img src="{{ asset($user->photo) }}"
                                                            style="width: 60px; height: 60px; border-radius:10px;"
                                                            alt="avatar">
                                                    @else
                                                        <div class="avatar avatar-xl " style="margin-left:0rem;">
                                                            <span class="avatar-title">
                                                                <?php
$position = strpos($user->full_name, ' ');
if ($position != 0) {
    echo substr($user->full_name, 0, 1);
}

?>
                                                         </span>
                                                        </div>
                                                    @endif
                                                </div>

                                                <div class="col-sm-8">
                                                    <div class="user-meta-info">
                                                        <p class="user-name" data-name="Susan">{{ $user->full_name }}
                                                        </p>
                                                        <span
                                                            class="badge outline-badge-secondary">{{ $user->phone_number }}</span>
                                                    </div>
                                                </div>


                                            </div>
                                        </td>
                                        <td>
                                                    <span class="badge badge-warning"> {{ $user->bank_type }} </span>

                                                        <p> {{ $user->account_type }} </p>
                                                    </td>
                                        <td>
                                            <p class="user-name" data-name="Susan">
                                                <span class="badge badge-pills badge-primary">
                                                    {{ $user->Today($user->id) }} - subscriber</span>
                                            </p>

                                            <span
                                                class="badge outline-badge-danger">{{ $user->todayRev($user->id) }}
                                                - birr</span>
                                        </td>
                                        <td>
                                            <p class="user-name" data-name="Susan">
                                                <span class="badge badge-pills badge-primary">
                                                    {{ $user->Week($user->id) }} -subscriber</span>
                                            </p>
                                            <span
                                                class="badge outline-badge-danger">{{ $user->weekRev($user->id) }}-
                                                birr</span>
                                            </span>

                                        </td>
                                        <td class="text-center"><span class="text-info">
                                                <p class="user-name" data-name="Susan">
                                                    <span class="badge badge-pills badge-primary">
                                                        {{ $user->Month($user->id) }} -subscriber</span>
                                                </p>

                                                <span
                                                    class="badge outline-badge-danger">{{ $user->monthRev($user->id) }}-
                                                    birr</span>
                                            </span>
                                        </td>
                                        <td class="text-center">

                                            <span class="badge badge-success"> {{ $user->totalSub($user->id) }}
                                            </span>
                                            <span class="badge badge-danger"> {{ round(  $user->total11($user->id), 3) }}    -
                                                birr </span>

                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>

                        </table>
                       @endif

                    </div>

                    {{ $users->links() }}
                </div>
            </div>
        </div>
</div>
<script>
                            function today(){
                                 
    var block = $('#report');
    $(block).block({ 
        message: '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-loader spin"><line x1="12" y1="2" x2="12" y2="6"></line><line x1="12" y1="18" x2="12" y2="22"></line><line x1="4.93" y1="4.93" x2="7.76" y2="7.76"></line><line x1="16.24" y1="16.24" x2="19.07" y2="19.07"></line><line x1="2" y1="12" x2="6" y2="12"></line><line x1="18" y1="12" x2="22" y2="12"></line><line x1="4.93" y1="19.07" x2="7.76" y2="16.24"></line><line x1="16.24" y1="7.76" x2="19.07" y2="4.93"></line></svg>',
        timeout: 20000, //unblock after 2 seconds
        overlayCSS: {
            backgroundColor: '#000',
            opacity: 0.95,
            cursor: 'wait'
        },
        css: {
            border: 0,
            color: '#fff',
            padding: 0,
            backgroundColor: 'transparent'
        }
    });


    var block2 = $('#report2');
    $(block2).block({ 
        message: '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-loader spin"><line x1="12" y1="2" x2="12" y2="6"></line><line x1="12" y1="18" x2="12" y2="22"></line><line x1="4.93" y1="4.93" x2="7.76" y2="7.76"></line><line x1="16.24" y1="16.24" x2="19.07" y2="19.07"></line><line x1="2" y1="12" x2="6" y2="12"></line><line x1="18" y1="12" x2="22" y2="12"></line><line x1="4.93" y1="19.07" x2="7.76" y2="16.24"></line><line x1="16.24" y1="7.76" x2="19.07" y2="4.93"></line></svg>',
        timeout: 20000, //unblock after 2 seconds
        overlayCSS: {
            backgroundColor: '#000',
            opacity: 0.95,
            cursor: 'wait'
        },
        css: {
            border: 0,
            color: '#fff',
            padding: 0,
            backgroundColor: 'transparent'
        }
    });
                            }
  
                        </script>
</div>