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
                        <div class="card-body mt-4">
                            <h3>{{ $posts->name }}</h3>
                            <p>郵便番号: {{ $posts->post_number }}</p>
                            <p>住所: {{ $posts->adress }}</p>
                            <p>営業開始時間: {{ $posts->buisiness_start_time }}</p>
                            <p>営業終了時間: {{ $posts->buisiness_end_time }}</p>
                            <p>料金(1分あたり): {{ $posts->price_per_minute }}円</p>
                            <p>備考: {{ $posts->notes }}</p>

                            <div class="mb-4">
                                <p>入力形式　例　2023-04-08 23:08:14</p>
                                <label for="start_time" class="block text-gray-700 text-sm font-bold mb-2">利用開始日時：</label>
                                <input type="text" name="start_time" id="start_time" class="border-gray-300 rounded-md shadow-sm focus:ring focus:ring-indigo-200 focus:border-indigo-500" required>
                            </div>
                            <div class="mb-4">
                                <label for="end_time" class="block text-gray-700 text-sm font-bold mb-2">利用終了日時：</label>
                                <input type="text" name="end_time" id="end_time" class="border-gray-300 rounded-md shadow-sm focus:ring focus:ring-indigo-200 focus:border-indigo-500" required>
                            </div>

                            <button type="button" id="calculateTotal" class="btn btn-primary">
                                合計金額を計算
                            </button>
                            <p id="totalAmount">合計料金: <span>0</span> 円</p>
                            <div class="col-md-6 d-flex justify-content-center align-items-center">
                            <img src="{{ asset('images/payimg.jpg') }}">
                            </div>
                            <input type="hidden" name="total_amount" id="total_amount">
                        </div>
                        <button type="submit" class="mb-5 btn btn-success">予約する</button>
                    </div>
                    
                </div>
                
            </div>
            
        </div>

        <!-- 他の入力フィールド -->
        
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
