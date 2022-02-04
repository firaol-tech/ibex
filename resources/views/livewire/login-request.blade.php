<div>
    <div class="my-container " id="mymodal">

        <div class="box " id="box">
        <span class="close" id="closedIcon" onclick="myclose()" style="margin:1rem 2rem 0rem 2rem;   font-size:4rem; font-weight:bold; ">&times;</span>
            <div class="row">
                <div class="col-sm-6 loginIcon" style="height:80vh">
                    <img style="overflow:hidden; width:100%; height:80%;" class="wave" src="MY/login.svg">
                    <p class="text-center text-primary"> @lang('free_service') </p>
                </div>

                <div class="col-sm-6  ">

                    <h3 style="text-align:center; font-weight:bold; font-family: sans-serif;" class="text-primary text">@lang('login_to_account')</h3>
                    <div class="box1">
                        @if ( $errorMessage != null)

                        <div class=""
                            style="background:#f5c6cb; padding:10px; color:#721c24; width:96%; border-radius:5px; margin-bottom:10px; margin-left:-8%;"
                            role="alert">
                        @lang('wrong_credential')  
                        </div>
                        @else
                        <div class="" style="height:3.5rem;  "></div>
                        @endif

                        <div class="input-divone">
                          @lang('phone_number')
                            <div class="input-div @error('userName')is-invalid  @enderror">

                                <input style="padding-left:1.5rem;" placeholder="@lang('phone_number')" wire:model.defer="userName" type="text" class="input">
                            </div>
                            @error('userName') <span style="color:red">{{ $message }}</span> @enderror
                        </div>

                        <br>
                        <div class="input-divone">

                            @lang('password')
                            <div class="input-div @error('password')is-invalid  @enderror"">

                                        <input wire:model.defer="password" style="padding-left:1.5rem;" type="password" placeholder="@lang('password')"
                                class="input">
                            </div>
                            @error('password') <span style="color:red">{{ $message }}</span> @enderror
                        </div>
                        <div class="button-box">
                            <button type="submit" wire:click="login" onclick="LogingButton()">
                                <span class="display-none" id="loading" style="display:none; ">
                                </span>
                                <span id="loginSpan" wire:loading.class="display-none">@lang('login')</span>
                            </button>
                        </div>

                    </div>
                </div>
            </div>



        </div>
    </div>

    <script>
    function LogingButton() {
        document.getElementById('loginSpan').style.display = "none";
        document.getElementById('loading').style.display = "block";
    }



    window.addEventListener('loginDehydrate', event => {
        document.getElementById('mymodal').style.display = "block";
        document.getElementById('box').style.height = "85vh";

    })
    </script>
</div>