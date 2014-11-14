<h4>منظور</h4>
<div style="display: block;">
    <input type="checkbox" value="DBC_PURPOSE_SALE" name="purpose[]" id="purpose_" class="board-filter-checkbox">
    <label>فروش</label>

    <div class="clearfix"></div>
    <input type="checkbox" value="DBC_PURPOSE_RENT" name="purpose[]" id="purpose_" class="board-filter-checkbox">
    <label>اجاره</label>

    <div class="clearfix"></div>
    <input type="checkbox" value="DBC_PURPOSE_BOTH" name="purpose[]" id="purpose_" class="board-filter-checkbox">
    <label>فروش و اجاره</label>
</div>
<h4>نوع</h4>
<div style="display: block;">
    <input type="checkbox" value="DBC_TYPE_APARTMENT" name="type[]" id="type_" class="board-filter-checkbox">
    <label>آپارتمان</label>

    <div class="clearfix"></div>
    <input type="checkbox" value="DBC_TYPE_HOUSE" name="type[]" id="type_" class="board-filter-checkbox">
    <label>خانه</label>

    <div class="clearfix"></div>
    <input type="checkbox" value="DBC_TYPE_LAND" name="type[]" id="type_" class="board-filter-checkbox">
    <label>زمین</label>

    <div class="clearfix"></div>
    <input type="checkbox" value="DBC_TYPE_COMSPACE" name="type[]" id="type_" class="board-filter-checkbox">
    <label>ساختمان تجاری</label>
</div>
<h4>قیمت</h4>
<div style="display: block;">
    <div class="clearfix"></div>
    <input type="text" name="price_min" id="price_min">
    <p>تومان</p>
    <input type="text" name="price_max" id="price_max">
</div>

<h4>قیمت برای هر واحد</h4>
<div style="display: block;">
    <div class="clearfix"></div>
    <input type="text" name="price_per_unit_min" id="price_per_unit_min">
    <p>تومان</p>
    <input type="text" name="price__per_unit_max" id="price__per_unit_max">
    <div class="clearfix"></div>
    <select name="price_unit">
        <option value="sqft">فیت مربع</option>
        <option value="sqmeter">متر مربع</option>
    </select>
</div>

<h4>قیمت اجاره</h4>
<div style="display: block;">
    <div class="clearfix"></div>
    <input type="text" name="rent_price_min" id="rent_price_min">
    <p>تومان</p>
    <input type="text" name="rent_price_max" id="rent_price_max">
    <div class="clearfix"></div>
    <select name="rent_price_unit">
        <option value="per_month">در ماه</option>
    </select>
</div>

<h4>اتاق خواب</h4>
<div style="display: block;">
    <div class="clearfix"></div>
    <input type="text" name="bedroom_min" id="bedroom_min">
    <p>بین</p>
    <input type="text" name="bedroom_max" id="bedroom_max">
</div>

<h4>حمام و دستشویی</h4>
<div style="display: block;">
    <div class="clearfix"></div>
    <input type="text" name="bath_min" id="bath_min">
    <p>بین</p>
    <input type="text" name="bath_max" id="bath_max">
</div>


<h4>سال ساخت</h4>
<div style="display: block;">
    <div class="clearfix"></div>
    <input type="text" name="year_min" id="year_min">
    <p>بین</p>
    <input type="text" name="year_max" id="year_max">
</div>


<h4>وضعیت</h4>
<div style="display: block;">
    <input type="checkbox" value="DBC_CONDITION_NEW" name="status[]" id="status_" class="board-filter-checkbox">
    <label>جدید</label>

    <div class="clearfix"></div>
    <input type="checkbox" value="DBC_CONDITION_AVAILABLE" name="status[]" id="status_" class="board-filter-checkbox">
    <label>موجود</label>

    <div class="clearfix"></div>
    <input type="checkbox" value="DBC_CONDITION_SOLD" name="status[]" id="status_" class="board-filter-checkbox">
    <label>فروخته شده</label>

    <div class="clearfix"></div>
    <input type="checkbox" value="DBC_CONDITION_AUCTION" name="status[]" id="status_" class="board-filter-checkbox">
    <label>حراج</label>
</div>

<h4>امکانات</h4>
<p>امکانات مورد نظر خود را انتخاب نمایید</p>


<div class="hidden">
    <h4>Address Filter</h4>
    <h4>Country</h4>
    <div style="display: block">
        <select name="country[]" multiple="multiple" id="country" data-placeholder="انتخاب کشور" >
            <option value="IR">ایران</option>
    </div>


    <p>State & City will be multiple value same as country</p>

    <h4>Distance (will be used for geocoding)</h4>
    <div style="display: block">
        <input type="text" name="distance" id="distance">
    </div>
</div>