@extends('site.layout.auth_layout')
@section('head')
    <title>فعالسازی حساب کاری</title>
@endsection
@section('content')

    <section class="h-screen px-4 flex items-center">
        <div class="container mx-auto max-w-screen-lg">
            <div class="bg-white rounded-2xl overflow-hidden">
                <div class="flex flex-col md:flex-row gap-8">
                    <div class="flex-1 p-8 md:p-4 lg:p-20 lg:pb-0">
                        <ul class="errors">
                            @if(session()->has('error'))
                                <li style="color: red">{{session()->get('error')}}</li>
                            @endif
                        </ul>
                        @if($errors->any())
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li style="color: red">{{$error}}</li>
                                @endforeach
                            </ul>
                        @endif
                        <meta name="csrf-token" content="{{ csrf_token() }}"/>
                        <form action="{{route('active.store')}}" method="post" id="active_account">
                            @csrf
                            <h2 class="text-3xl font-YekanBakh-ExtraBlack my-4">فعالسازی حساب</h2>
                            <input type="hidden" name="mobile"
                                   value="{{request()->route()->parameter('mobile_decode')}}">
                            <label class="label">
                                <span class="label-text-alt">کد فعالسازی:</span>
                            </label>
                            <input type="password" name="otpcode" class="input input-bordered w-full my-2"/>
                            <a class="text-center my-4 float-right cursor-pointer" data-resend="true"
                               href="javascript:void(0)">ارسال مجدد کد</a>
                            <div id="timer" style="display: none">03:00</div>

                            <button class="btn bg-stone-800 hover:bg-stone-900 text-white w-full my-4" type="submit">
                                ادامه
                            </button>

                        </form>
                    </div>
                    <div class="hidden md:block">
                        <img class="bg-cover" src="{{asset('site/assets/images/sign-up.jpg')}}" alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>










@endsection
@section('js')
    <script>
        let timer;
        let seconds = 180; // 3 minutes * 60 seconds per minute

        // Start the timer automatically when the page loads
        // $(document).ready(function() {
        //     startTimer();
        // });

        function startTimer() {
            stopTimer()
            timer = setInterval(updateTimer, 1000);
        }


        function stopTimer() {
            clearInterval(timer);
        }

        function updateTimer() {
            if (seconds > 0) {
                seconds--;

                const formattedTime = pad(Math.floor(seconds / 60)) + ":" + pad(seconds % 60);
                $('#timer').text(formattedTime);
            } else {
                clearInterval(timer);
                alert("Timer expired!");
            }
        }

        function pad(value) {
            return value < 10 ? "0" + value : value;
        }
    </script>

    <script>
        $(document).ready(function () {
            $("[data-resend]").click(function () {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url: "{{route('active_ajax')}}",
                    type: "POST",
                    data: $("#active_account").serialize(),
                    dataType: "JSON",
                    success: function (res) {
                        $(".errors li").remove()
                        if (typeof res.error !== 'undefined') {
                            console.log(res)
                            console.log("error")
                            $(".errors").append("<li style='color: red'>" + res.error + "</li>")
                        }
                        if (typeof res.success !== 'undefined') {
                            console.log(res)
                            console.log("success")
                            $(".errors").append("<li style='color: red'>" + res.success + "</li>")
                            $("[data-resend]").css('display', 'none')
                            $("#timer").css('display', 'block')
                                startTimer();
                            setTimeout(function () {
                                $("[data-resend]").css('display', 'block')
                                $("#timer").css('display', 'none')
                            }, 60000)

                        }
                    },
                    error: function () {

                    }
                })
            })
        })
    </script>




@endsection





