Card for All Shareholders
<!-- <div class="col-md-6">
                        <div class="card shadow p-3 mb-5 bg-body rounded">
                            <!-- Search input for shareholders -->
<div>
    <label>Share holder</label><br>
    <select id="select" multiple name="shareholders" placeholder="Select shareholder" style="width: 400px;" data-silent-initial-value-set="false " required>
        @foreach($shareholders as $shareholder)
        <option value="{{$shareholder->CSD}}">{{ $shareholder->Name }}</option>
        @endforeach
    </select>
</div>
<!-- Other content related to shareholders -->
</div>
<!-- </div> -->

<!-- Card for All Proxies -->
<div class="col-md-6">
    <div class="card shadow p-3 mb-5 bg-body rounded">
        <!-- Search input for proxies -->
        <div>
            <label>Proxies</label><br>
            <select id="multi_option" multiple name="proxy" placeholder="Select proxy" style="width: 400px;" data-silent-initial-value-set="false" required>
                @foreach($proxies as $proxy)
                <option value="{{ $proxy->name }}">{{ $proxy->Name }}</option>
                @endforeach
            </select>
            <!-- </div> -->
            <!-- Other content related to proxies -->
            <!-- </div> -->
            <!-- </div> -->