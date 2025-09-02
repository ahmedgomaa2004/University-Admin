# Dashboard Upgrade Documentation

## الميزات الجديدة المضافة

### 1. شريط الترحيب الشخصي (Welcome Bar)
- رسالة ترحيب مخصصة حسب الوقت: "Good morning/afternoon/evening, {user_name} 👋"
- عرض التاريخ والوقت الحالي
- يظهر أعلى عنوان "Dashboard"

### 2. أزرار الإجراءات السريعة (Quick Actions)
- **Add Student** - يوجه لصفحة إنشاء طالب جديد
- **Add Course** - يوجه لصفحة إنشاء دورة جديدة  
- **Add Employee** - يوجه لصفحة إنشاء موظف جديد
- **Add Doctor** - يوجه لصفحة إنشاء طبيب جديد
- **Add Department** - يوجه لصفحة إنشاء قسم جديد
- الأزرار تظهر بناءً على صلاحيات المستخدم (role/permission)

### 3. البحث العام (Global Search)
- حقل بحث في أعلى الصفحة
- يبحث في: Students, Doctors, Employees, Courses
- يعرض أول 5 نتائج
- نتائج تفاعلية مع إمكانية الانتقال للملف الشخصي

### 4. الرسم البياني: الطلاب حسب القسم
- Bar chart باستخدام Chart.js
- البيانات تأتي من قاعدة البيانات
- يتم تحديثها مع كل تحميل صفحة
- كاش لمدة 5 دقائق لتخفيف الضغط على قاعدة البيانات

### 5. آخر النشاطات (Recent Activities)
- عرض آخر 10 أحداث (إضافة/تعديل/حذف)
- تسجيل تلقائي للنشاطات عبر Observers
- جدول `activity_logs` لتخزين النشاطات
- عرض الوقت بالشكل النسبي (مثل: منذ 5 دقائق)

### 6. محول الوضع الليلي/الفاتح (Dark/Light Mode)
- زر تبديل في أسفل يمين الصفحة
- حفظ الاختيار في localStorage
- تطبيق كلاس `dark-mode` على الـ body
- تصميم متجاوب مع الوضع الليلي

### 7. تحسينات الأداء
- كاش لمدة 5 دقائق لجميع البيانات
- استخدام Observers لتسجيل النشاطات
- تحسين استعلامات قاعدة البيانات

## الملفات الجديدة

### Controllers
- `app/Http/Controllers/DashboardController.php` - كنترولر رئيسي للـ Dashboard

### Models
- `app/Models/ActivityLog.php` - نموذج سجل النشاطات
- `app/Models/Student.php` - نموذج الطالب
- `app/Models/Doctor.php` - نموذج الطبيب
- `app/Models/Employee.php` - نموذج الموظف
- `app/Models/Course.php` - نموذج الدورة
- `app/Models/Department.php` - نموذج القسم

### Observers
- `app/Observers/ActivityLogObserver.php` - مراقب لتسجيل النشاطات

### Migrations
- `database/migrations/2024_01_01_000000_create_activity_logs_table.php` - جدول سجل النشاطات

### Views
- `resources/views/welcome.blade.php` - تم تحديثه بالكامل

## Routes الجديدة

```php
// Dashboard API routes
Route::middleware('auth')->group(function () {
    Route::get('/api/students-per-department', [DashboardController::class, 'getStudentsPerDepartment']);
    Route::get('/api/global-search', [DashboardController::class, 'globalSearch']);
});
```

## كيفية الاستخدام

### 1. الوصول للـ Dashboard
- تسجيل الدخول كأحد المستخدمين
- الانتقال للصفحة الرئيسية `/`

### 2. استخدام البحث العام
- كتابة اسم في حقل البحث
- انتظار ظهور النتائج
- النقر على النتيجة للانتقال للملف الشخصي

### 3. تبديل الوضع الليلي
- النقر على زر التبديل في أسفل يمين الصفحة
- الاختيار يتم حفظه تلقائياً

### 4. عرض الإحصائيات
- البيانات يتم تحديثها تلقائياً
- كاش لمدة 5 دقائق لتحسين الأداء

## المتطلبات

- Laravel 10+
- PHP 8.1+
- MySQL/MariaDB
- Chart.js (مدمج مع AdminLTE)
- Font Awesome (مدمج مع AdminLTE)

## التثبيت

1. تشغيل الـ migrations:
```bash
php artisan migrate
```

2. التأكد من وجود جميع الـ Models

3. التأكد من تسجيل الـ Observers في `AppServiceProvider`

4. تشغيل التطبيق:
```bash
php artisan serve
```

## ملاحظات تقنية

- جميع البيانات تستخدم كاش لمدة 5 دقائق
- النشاطات يتم تسجيلها تلقائياً عبر Observers
- البحث العام يعمل بـ AJAX
- الرسم البياني يستخدم Chart.js
- الوضع الليلي يستخدم CSS classes و localStorage

## استكشاف الأخطاء

### مشكلة في عرض البيانات
- التأكد من وجود البيانات في قاعدة البيانات
- فحص الـ cache
- التأكد من صحة الـ Models

### مشكلة في البحث
- التأكد من وجود route `/api/global-search`
- فحص console للـ JavaScript errors

### مشكلة في الرسم البياني
- التأكد من وجود Chart.js
- فحص البيانات في الـ API endpoint

## الدعم

لأي استفسارات أو مشاكل، يرجى التواصل مع فريق التطوير.
