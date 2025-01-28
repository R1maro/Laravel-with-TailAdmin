<?php
<form action="{{ route('admin.setting.update', $setting->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="form-group">
        <label for="site_title">عنوان سایت</label>
        <input type="text" name="site_title" id="site_title" class="form-control" value="{{ old('site_title', $setting->site_title) }}" required>
    </div>

    <div class="form-group">
        <label for="header_content">محتوای هدر</label>
        <textarea name="header_content" id="header_content" class="form-control" required>{{ old('header_content', $setting->header_content) }}</textarea>
    </div>

    <div class="form-group">
        <label for="footer_content">محتوای فوتر</label>
        <textarea name="footer_content" id="footer_content" class="form-control" required>{{ old('footer_content', $setting->footer_content) }}</textarea>
    </div>

    <div class="form-group">
        <label for="limit_change_password">محدودیت تغییر رمز عبور</label>
        <input type="number" name="limit_change_password" id="limit_change_password" class="form-control" value="{{ old('limit_change_password', $setting->limit_change_password) }}" required>
    </div>

    <div class="form-group">
        <label for="logo">آپلود لوگو جدید</label>
        <input type="file" name="logo" id="logo" class="form-control">
        <small>لوگوی فعلی:</small>
        @if ($setting->logo)
            <div>
                <img src="{{ asset('storage/' . $setting->logo) }}" alt="لوگوی فعلی" width="100">
            </div>
        @else
            <p>لوگوی فعلی وجود ندارد</p>
        @endif
    </div>

    <button type="submit" class="btn btn-primary">ذخیره تنظیمات</button>
</form>
