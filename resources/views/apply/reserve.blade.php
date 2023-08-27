<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('予約ページ') }}
        </h2>
    </x-slot>


    <form id="reservationForm" method="POST" action="{{ route('reserve.store') }}">
        @csrf
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-body">
                        <h1 class="t-4 font-bold mb-4">ワークスペースの詳細情報</h1>
                            <h2>{{ $posts->name }}</h2>
                            <p class="text-lg font-bold mb-1">ワークスペースの所在地</p>
                            <h2 class="mb-3">〒 {{ $posts->post_number }}　{{ $posts->adress }}</h2>
                            <p class="text-lg font-bold mb-1">営業開始時間</p>
                            <h2 class="mb-3">{{ $posts->buisiness_start_time }}　〜　{{ $posts->buisiness_end_time }}</h2>
                            <p class="text-lg font-bold mb-1">料金(1分あたり)</p>
                            

                            <h2 class="mb-3">{{ $posts->price_per_minute }}円</h2>
                            <h2 class="mb-1 text-lg  font-bold">備考: </h2>
                            <h2 class="mb-5">{{ $posts->notes }}</h2>

                            <h1 class="t-4 font-bold mb-4">利用時間の入力</h1>
                            <div class="mb-4">
                                <p class="mb-1 underline-text">フォーマット　年-月-日　時間-日付-秒</p>
                                <p>入力形式　例　2023-08-25 10:00:00</p>
                                <label for="start_time" class="block text-gray-700 text-xl font-bold mb-2">利用開始日時：</label>
                                <input type="text" name="start_time" id="start_time" class="border-gray-300 rounded-md shadow-sm focus:ring focus:ring-indigo-200 focus:border-indigo-500" required>
                            </div>
                            <div class="mb-4">
                                <label for="end_time" class="block text-gray-700 text-xl font-bold mb-2">利用終了日時：</label>
                                <input type="text" name="end_time" id="end_time" class="border-gray-300 rounded-md shadow-sm focus:ring focus:ring-indigo-200 focus:border-indigo-500" required>
                            </div>
                            <button type="button" id="calculateTotal" class="btn btn-primary">
                                合計金額を計算
                            </button>
                            <p id="totalAmount" class="text-xl">合計料金: <span>0</span> 円</p>
                            
                            <input type="hidden" name="total_amount" id="total_amount">
                        </div>



                        <div class="container py-5">
                                <div class="row mb-4">
                                    <div class="">
                                        <h1 class="t-5 font-bold">お支払い方法</h1>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="">
                                        <div class="card ">
                                            <div class="card-header">
                                                <div class="bg-white shadow-sm pt-4 pl-2 pr-2 pb-2">
                                                    <ul role="tablist" class="nav bg-light nav-pills rounded nav-fill mb-3">
                                                        <li class="nav-item"> <a data-toggle="pill" href="#credit-card" class="nav-link active "> <i class="fas fa-credit-card mr-2"></i> クレジットカード </a> </li>
                                                        <li class="nav-item"> <a data-toggle="pill" href="#paypal" class="nav-link "> <i class="fab fa-paypal mr-2"></i> Paypal </a> </li>
                                                        <li class="nav-item px-4"> <a data-toggle="pill" href="#net-banking" class="nav-link "> <i class="fas fa-mobile-alt mr-2"></i> Apple Pay </a> </li>
                                                    </ul>
                                                </div>
                                                <div class="tab-content">
                                                    <div id="credit-card" class="tab-pane fade show active pt-3">
                                                        <div role="form" onsubmit="event.preventDefault()">
                                                            <div class="form-group">
                                                                <label for="cardNumber">
                                                                    <h6>カード番号</h6>
                                                                </label>
                                                                <div class="input-group"> <input type="text" name="cardNumber" placeholder="Valid card number" class="form-control ">
                                                                    <div class="input-group-append"></div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-sm-8">
                                                                    <div class="form-group">
                                                                        <label><span class="hidden-xs">
                                                                                <h6>有効期限</h6>
                                                                            </span></label>
                                                                        <div class="input-group"> <input type="number" placeholder="MM" name="" class="form-control"> <input type="number" placeholder="YY" name="" class="form-control"> </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-4">
                                                                    <div class="form-group mb-4">
                                                                        <label data-toggle="tooltip" title="Three digit CV code on the back of your card">
                                                                            <h6>セキュリティコード <i class="fa fa-question-circle d-inline"></i></h6>
                                                                        </label> <input type="text" class="form-control"> </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div id="paypal" class="tab-pane fade pt-3">
                                                        <h6 class="pb-2">Select your paypal account type</h6>
                                                        <div class="form-group "> <label class="radio-inline"> <input type="radio" name="optradio" checked> Domestic </label> <label class="radio-inline"> <input type="radio" name="optradio" class="ml-5">International </label></div>
                                                        <p> <button type="button" class="btn btn-primary "><i class="fab fa-paypal mr-2"></i> Log into my Paypal</button> </p>
                                                        <p class="text-muted"> Note: After clicking on the button, you will be directed to a secure gateway for payment. After completing the payment process, you will be redirected back to the website to view details of your order. </p>
                                                    </div>
                                                    <div id="net-banking" class="tab-pane fade pt-3">
                                                        <div class="form-group ">
                                                            <label for="Select Your Bank">
                                                                <h6>Select your Bank</h6>
                                                            </label>
                                                            <select class="form-control" id="ccmonth">
                                                                <option value="" selected disabled>--Please select your Bank--</option>
                                                                <option>Bank 1</option>
                                                                <option>Bank 2</option>
                                                                <option>Bank 3</option>
                                                                <option>Bank 4</option>
                                                                <option>Bank 5</option>
                                                                <option>Bank 6</option>
                                                                <option>Bank 7</option>
                                                                <option>Bank 8</option>
                                                                <option>Bank 9</option>
                                                                <option>Bank 10</option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <p> <button type="button" class="btn btn-primary "><i class="fas fa-mobile-alt mr-2"></i> Proceed Payment</button> </p>
                                                        </div>
                                                        <p class="text-muted">Note: After clicking on the button, you will be directed to a secure gateway for payment. After completing the payment process, you will be redirected back to the website to view details of your order. </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                        <button type="submit" class="mb-5 btn btn-success">予約する</button>
                    </div>
                </div>
            </div>
        </div>

        <input type="hidden" name="post_id" value="{{ $posts-> id }}">
        <input type="hidden" name="hostuser_id" value="{{ $posts-> user_id}}">

    </form>

    <script>
        function parseDateTime(dateTimeStr) {
            var parts = dateTimeStr.split(' ');
            var dateParts = parts[0].split('-');
            var timeParts = parts[1].split(':');
            return new Date(dateParts[0], dateParts[1] - 1, dateParts[2], timeParts[0], timeParts[1], timeParts[2]);
        }

        document.getElementById('calculateTotal').addEventListener('click', function() {
            var startTimeStr = document.getElementById('start_time').value;
            var endTimeStr = document.getElementById('end_time').value;
            var startTime = parseDateTime(startTimeStr);
            var endTime = parseDateTime(endTimeStr);
            var pricePerMinute = {{ $posts->price_per_minute }};
            var totalMinutes = (endTime - startTime) / (1000 * 60);
            var totalAmount = totalMinutes * pricePerMinute;
            document.getElementById('totalAmount').querySelector('span').textContent = totalAmount;

            // 隠しフィールドに値を設定
            document.getElementById('total_amount').value = totalAmount;
        });
    </script>
</x-app-layout>
