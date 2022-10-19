<div class="bg-light py-5 px-3" style="width: 100%;">
    <div class="px-5">

        <div class="mb-3">
            <label for="account_name" class="form-label text-dark">Name</label>
            <select name="account_name" class="form-select" id="account_name">
                <option value="BTC"
                    {{ isset($paymentMethod) && $paymentMethod->account_name == 'BTC' ? 'selected' : '' }}>BTC</option>
                <option value="XDG"
                    {{ isset($paymentMethod) && $paymentMethod->account_name == 'XDG' ? 'selected' : '' }}>Doge</option>
                <option value="ETH"
                    {{ isset($paymentMethod) && $paymentMethod->account_name == 'ETH' ? 'selected' : '' }}>Ethereum
                </option>
                <option value="LTC"
                    {{ isset($paymentMethod) && $paymentMethod->account_name == 'LTC' ? 'selected' : '' }}>LiteCoin
                </option>
                <option value="TRN"
                    {{ isset($paymentMethod) && $paymentMethod->account_name == 'TRN' ? 'selected' : '' }}>Tron</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="account_id" class="form-label text-dark">Account ID</label>
            <input type="account_id" value="{{ isset($paymentMethod) ? $paymentMethod->account_id : '' }}"
                class="form-control" id="account_id" name="account_id">
        </div>

        <button class="btn btn-primary text-center" type="submit">
            Save
        </button>
    </div>
</div>
