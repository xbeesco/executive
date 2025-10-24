# بنية Filament Resources الكاملة - Executive CMS v4.0

## 🏗️ نظرة عامة على البنية

```
Executive CMS
├── Pages
│   └── SettingsPage (إعدادات عامة موحدة)
│
└── Resources
    ├── Users (إدارة المستخدمين)
    ├── Pages (الصفحات الموحدة)
    ├── Posts (المقالات)
    ├── Services (الخدمات)
    ├── Events (الفعاليات)
    ├── Categories (تصنيفات المقالات)
    ├── Tags (الوسوم)
    ├── Forms (الاستمارات)
    ├── FormSubmissions (إرسالات الاستمارات)
    └── Comments (التعليقات)
```

---

## 📋 جدول المحتويات

1. [SettingsPage](#settingspage)
2. [UserResource](#userresource)
3. [PageResource](#pageresource)
4. [PostResource](#postresource)
5. [ServiceResource](#serviceresource)
6. [EventResource](#eventresource)
7. [CategoryResource](#categoryresource)
8. [TagResource](#tagresource)
9. [FormResource](#formresource)
10. [FormSubmissionResource](#formsubmissionresource)
11. [CommentResource](#commentresource)

---

## SettingsPage

**الموقع:** `app/Filament/Pages/SettingsPage.php`

**الغرض:** صفحة إعدادات موحدة لكل الإعدادات العامة للموقع

### البنية

```
SettingsPage
├── Tab 1: المعلومات العامة
│   ├── Site Name (site_name) - نص
│   ├── Site Email (site_email) - بريد إلكتروني
│   ├── Site Phone (site_phone) - نص
│   ├── Site Address (site_address) - نص طويل
│   ├── Site Logo (site_logo) - رفع ملف صور
│   └── Site Favicon (site_favicon) - رفع ملف صور
│
├── Tab 2: وسائل التواصل الاجتماعي
│   ├── Facebook (facebook) - URL
│   ├── Twitter (twitter) - URL
│   ├── Instagram (instagram) - URL
│   └── LinkedIn (linkedin) - URL
│
├── Tab 3: بناء القائمة الرئيسية
│   └── Menu (menu) - Repeater مع التراكيب المتداخلة
│       └── لكل عنصر:
│           ├── Label (label) - نص
│           ├── URL (url) - نص
│           ├── Icon (icon) - اختياري
│           └── Children (children) - تكرار متداخل
│
└── Tab 4: إعدادات SEO الافتراضية
    ├── Meta Title Default (seo_meta_title) - نص
    ├── Meta Description Default (seo_meta_description) - نص طويل
    ├── Meta Keywords Default (seo_meta_keywords) - نص
    └── OG Image Default (seo_og_image) - رفع صور
```

### الربط مع Database

```php
// جدول settings سيحتوي على:
[
  'key' => 'general',
  'value' => {
    'site_name' => 'Executive',
    'site_email' => 'info@executive.com',
    'site_phone' => '+201234567890',
    'site_address' => 'Cairo, Egypt',
    'site_logo' => '/images/logo.png',
    'site_favicon' => '/images/favicon.png'
  }
],
[
  'key' => 'social_links',
  'value' => {
    'facebook' => 'https://facebook.com/...',
    'twitter' => 'https://twitter.com/...',
    'instagram' => 'https://instagram.com/...',
    'linkedin' => 'https://linkedin.com/...'
  }
],
[
  'key' => 'menu',
  'value' => [
    {
      'id' => 1,
      'label' => 'الرئيسية',
      'url' => '/',
      'children' => [...]
    },
    ...
  ]
]
```

---

## UserResource

**الموقع:** `app/Filament/Resources/Users/UserResource.php`

**الغرض:** إدارة المستخدمين والمسؤولين

### Table Structure

#### Table Columns

| Column | Type | Settings | Notes |
|--------|------|----------|-------|
| id | TextColumn | sortable, searchable | الرقم التعريفي |
| name | TextColumn | sortable, searchable | اسم المستخدم |
| email | TextColumn | sortable, searchable, copyable | البريد الإلكتروني |
| created_at | DateColumn | sortable, format: Y-m-d | تاريخ الإنشاء |

#### Table Filters

```
- Filters: (لا توجد فلاتر خاصة)
```

#### Table Actions

```
- Edit Action
- Delete Action (مع تحذير)
```

### Form Structure

#### Section 1: معلومات الحساب

| Field | Type | Settings | Validation |
|-------|------|----------|-----------|
| name | TextInput | label: "الاسم", required | required\|string\|max:255 |
| email | TextInput | label: "البريد الإلكتروني", type: email, required, unique | required\|email\|unique:users,email |
| password | TextInput | type: password, required in create | required_on_create\|confirmed\|min:8 |

---

## PageResource

**الموقع:** `app/Filament/Resources/Pages/PageResource.php`

**الغرض:** إدارة جميع أنواع الصفحات (الرئيسية، الداخلية، الأرشيفات)

### Table Structure

#### Table Columns

| Column | Type | Settings | Notes |
|--------|------|----------|-------|
| title | TextColumn | sortable, searchable | عنوان الصفحة |
| slug | TextColumn | copyable | مسار URL |
| status | BadgeColumn | enum: ContentStatus | حالة النشر |
| page_type | BadgeColumn | settings.page_type | نوع الصفحة |
| featured_image | ImageColumn | circular | صورة مميزة |
| created_at | DateColumn | sortable | تاريخ الإنشاء |

#### Table Filters

```
- SelectFilter: status (Draft, Published)
- SelectFilter: page_type (Homepage, Inner Page, Archive)
```

#### Table Actions

```
- Edit Action
- Delete Action
```

### Form Structure

#### Section 1: معلومات أساسية

| Field | Type | Settings | Rules |
|-------|------|----------|-------|
| title | TextInput | required, live | required\|string\|max:255 |
| slug | TextInput | autofill from title | required\|string\|unique:pages |
| featured_image | FileUpload | image, multiple: false | image\|max:5120 |
| status | Select | enum: ContentStatus | required |

#### Section 2: نوع الصفحة والإعدادات

| Field | Type | Settings | Notes |
|-------|------|----------|-------|
| page_type | Select | enum: PageType, required | تحدد نوع الصفحة (تؤثر على الحقول اللاحقة) |
| header_style | Select | enum: HeaderStyle | مظهر الرأس (1-8) |
| footer_style | Select | enum: FooterStyle | مظهر التذييل (1-8) |
| show_title_bar | Toggle | | إظهار شريط العنوان |
| **Conditional** (عندما page_type = archive) | | | |
| archive_content_type | Select | enum: ArchiveContentType | نوع المحتوى (Posts, Services, Events) |
| archive_template | Select | enum: ArchiveTemplate | قالب الأرشيف (grid-col-2/3/4, masonry, classic) |

#### Section 3: بناء المحتوى

| Field | Type | Settings | Notes |
|-------|------|----------|-------|
| content | Builder | blocks: hero, text, image, services_grid, archive_grid | محتوى ديناميكي بالكتل |

**Block Types:**
```
- hero:
  - title (نص)
  - subtitle (نص)
  - image (صورة)
  - buttons (array: text, url, style)

- text:
  - text (محرر نصي)

- image:
  - image (صورة)
  - caption (نص توضيحي)

- services_grid:
  - columns (عدد الأعمدة)

- archive_grid:
  - columns (عدد الأعمدة)
  - per_page (عدد العناصر)
```

#### Section 4: الحقول الإضافية

| Field | Type | Settings | Notes |
|-------|------|----------|-------|
| **SEO (Fieldset)** | | | |
| seo.meta_title | TextInput | | |
| seo.meta_description | Textarea | | |
| seo.meta_keywords | TextInput | | |
| seo.og_image | FileUpload | image | |

---

## PostResource

**الموقع:** `app/Filament/Resources/Posts/PostResource.php`

**الغرض:** إدارة المقالات والمدونة

### Table Structure

#### Table Columns

| Column | Type | Settings | Notes |
|--------|------|----------|-------|
| title | TextColumn | sortable, searchable | عنوان المقالة |
| author | TextColumn | relationship: author.name | اسم الكاتب |
| status | BadgeColumn | enum: ContentStatus | حالة النشر |
| categories | TagsColumn | relationship: categories.name | التصنيفات |
| published_at | DateColumn | sortable | تاريخ النشر |
| created_at | DateColumn | sortable | تاريخ الإنشاء |

#### Table Filters

```
- SelectFilter: status
- SelectFilter: author (relationship)
- SelectFilter: categories (relationship)
```

#### Table Actions

```
- Edit Action
- Delete Action
```

### Form Structure

#### Section 1: معلومات أساسية

| Field | Type | Settings | Rules |
|-------|------|----------|-------|
| title | TextInput | required, live | required\|string\|max:255 |
| slug | TextInput | autofill from title | required\|unique:posts |
| excerpt | Textarea | | max:500 |
| featured_image | FileUpload | image | image\|max:5120 |
| author_id | Select | relationship: users, searchable | required |
| status | Select | enum: ContentStatus | required |
| published_at | DateTimePicker | | nullable |

#### Section 2: التصنيفات والوسوم

| Field | Type | Settings | Notes |
|-------|------|----------|-------|
| categories | Select | relationship: categories, multiple, searchable | تصنيفات متعددة |
| tags | Select | relationship: tags, multiple, creatable | وسوم مع إمكانية الإنشاء |

#### Section 3: المحتوى

| Field | Type | Settings | Notes |
|-------|------|----------|-------|
| content | Builder | blocks: text, image, quote | محتوى المقالة |

#### Section 4: SEO

| Field | Type | Settings | Notes |
|-------|------|----------|-------|
| **SEO (Fieldset)** | | | |
| seo.meta_title | TextInput | | |
| seo.meta_description | Textarea | | |
| seo.meta_keywords | TextInput | | |
| seo.og_image | FileUpload | image | |

---

## ServiceResource

**الموقع:** `app/Filament/Resources/Services/ServiceResource.php`

**الغرض:** إدارة الخدمات

### Table Structure

#### Table Columns

| Column | Type | Settings | Notes |
|--------|------|----------|-------|
| title | TextColumn | sortable, searchable | اسم الخدمة |
| icon | TextColumn | | الأيقونة (fas fa-xxx) |
| status | BadgeColumn | enum: ContentStatus | حالة النشر |
| featured_image | ImageColumn | circular | صورة الخدمة |
| created_at | DateColumn | sortable | تاريخ الإنشاء |

#### Table Actions

```
- Edit Action
- Delete Action
```

### Form Structure

#### Section 1: المعلومات الأساسية

| Field | Type | Settings | Rules |
|-------|------|----------|-------|
| title | TextInput | required, live | required\|string |
| slug | TextInput | autofill | required\|unique:services |
| excerpt | Textarea | | max:500 |
| icon | TextInput | placeholder: "fas fa-rocket" | |
| featured_image | FileUpload | image | image\|max:5120 |
| status | Select | enum: ContentStatus | required |

#### Section 2: المحتوى والمميزات

| Field | Type | Settings | Notes |
|-------|------|----------|-------|
| content | Builder | blocks: text, image | محتوى الخدمة |
| features | Repeater | | قائمة المميزات |
| - name | TextInput | | اسم المميزة |
| - icon | TextInput | | أيقونة المميزة |

#### Section 3: SEO

| Field | Type | Settings | Notes |
|-------|------|----------|-------|
| **SEO (Fieldset)** | | | |
| seo.meta_title | TextInput | | |
| seo.meta_description | Textarea | | |
| seo.og_image | FileUpload | | |

---

## EventResource

**الموقع:** `app/Filament/Resources/Events/EventResource.php`

**الغرض:** إدارة الفعاليات والأحداث

### Table Structure

#### Table Columns

| Column | Type | Settings | Notes |
|--------|------|----------|-------|
| title | TextColumn | sortable, searchable | اسم الفعالية |
| location | TextColumn | | مكان الفعالية |
| start_date | DateColumn | sortable | تاريخ البداية |
| end_date | DateColumn | | تاريخ النهاية |
| status | BadgeColumn | enum: ContentStatus | حالة النشر |
| created_at | DateColumn | sortable | تاريخ الإنشاء |

#### Table Filters

```
- SelectFilter: status
- DateFilter: start_date
```

#### Table Actions

```
- Edit Action
- Delete Action
```

### Form Structure

#### Section 1: المعلومات الأساسية

| Field | Type | Settings | Rules |
|-------|------|----------|-------|
| title | TextInput | required, live | required\|string |
| slug | TextInput | autofill | required\|unique:events |
| description | Textarea | | |
| location | TextInput | | |
| featured_image | FileUpload | image | image\|max:5120 |
| status | Select | enum: ContentStatus | required |

#### Section 2: التواريخ والتفاصيل

| Field | Type | Settings | Rules |
|-------|------|----------|-------|
| start_date | DateTimePicker | required | required\|date |
| end_date | DateTimePicker | | nullable\|date\|after:start_date |
| max_attendees | TextInput | numeric | nullable\|integer |

#### Section 3: المحتوى

| Field | Type | Settings | Notes |
|-------|------|----------|-------|
| content | Builder | blocks: text, image | محتوى الفعالية |

#### Section 4: SEO

| Field | Type | Settings | Notes |
|-------|------|----------|-------|
| **SEO (Fieldset)** | | | |
| seo.meta_title | TextInput | | |
| seo.meta_description | Textarea | | |
| seo.og_image | FileUpload | | |

---

## CategoryResource

**الموقع:** `app/Filament/Resources/Categories/CategoryResource.php`

**الغرض:** إدارة تصنيفات المقالات

### Table Structure

#### Table Columns

| Column | Type | Settings | Notes |
|--------|------|----------|-------|
| name | TextColumn | sortable, searchable | اسم التصنيف |
| slug | TextColumn | | |
| parent | TextColumn | relationship: parent.name | التصنيف الأب |
| posts_count | TextColumn | counts: posts | عدد المقالات |
| created_at | DateColumn | sortable | تاريخ الإنشاء |

#### Table Configuration

```
- Enable Tree View (for hierarchy)
```

#### Table Actions

```
- Edit Action
- Delete Action (with cascade warning)
```

### Form Structure

#### Section 1: المعلومات

| Field | Type | Settings | Rules |
|-------|------|----------|-------|
| name | TextInput | required, live | required\|string |
| slug | TextInput | autofill | required\|unique:categories |
| description | Textarea | | |
| parent_id | Select | relationship: parent, searchable, nullable | nullable\|exists:categories,id |

---

## TagResource

**الموقع:** `app/Filament/Resources/Tags/TagResource.php`

**الغرض:** إدارة الوسوم

### Table Structure

#### Table Columns

| Column | Type | Settings | Notes |
|--------|------|----------|-------|
| name | TextColumn | sortable, searchable | اسم الوسم |
| slug | TextColumn | | |
| posts_count | TextColumn | counts: posts | عدد المقالات |
| created_at | DateColumn | sortable | تاريخ الإنشاء |

#### Table Actions

```
- Edit Action
- Delete Action
```

### Form Structure

| Field | Type | Settings | Rules |
|-------|------|----------|-------|
| name | TextInput | required, live | required\|string |
| slug | TextInput | autofill | required\|unique:tags |

---

## FormResource

**الموقع:** `app/Filament/Resources/Forms/FormResource.php`

**الغرض:** بناء الاستمارات الديناميكية

### Table Structure

#### Table Columns

| Column | Type | Settings | Notes |
|--------|------|----------|-------|
| title | TextColumn | sortable, searchable | اسم الاستمارة |
| slug | TextColumn | | |
| status | BadgeColumn | active/inactive | حالة الاستمارة |
| submissions_count | TextColumn | counts: submissions | عدد الإرسالات |
| created_at | DateColumn | sortable | تاريخ الإنشاء |

#### Table Actions

```
- Edit Action
- Delete Action
- View Submissions (custom action)
```

### Form Structure

#### Section 1: المعلومات الأساسية

| Field | Type | Settings | Rules |
|-------|------|----------|-------|
| title | TextInput | required, live | required\|string |
| slug | TextInput | autofill | required\|unique:forms |
| description | Textarea | | |
| status | Select | options: active/inactive | required |

#### Section 2: حقول الاستمارة

| Field | Type | Settings | Notes |
|-------|------|----------|-------|
| fields | Builder | block types: text, email, textarea, number, checkbox, radio, select | تعريف حقول الاستمارة |

**Field Block Properties:**
```
- name (slug): معرّف الحقل الفريد
- label: تسمية الحقل
- type: نوع الحقل
- placeholder: النص المساعد
- required: هل الحقل إجباري
- width: العرض (full/half)
- options: للأنواع (radio, select, checkbox)
```

#### Section 3: إعدادات الإرسال

| Field | Type | Settings | Notes |
|-------|------|----------|-------|
| **Settings (Fieldset)** | | | |
| settings.submit_button_text | TextInput | | نص زر الإرسال |
| settings.success_message | Textarea | | رسالة النجاح |
| settings.redirect_url | TextInput | | URL للإعادة |
| settings.email_to | TextInput | email | بريد الإرسال |

---

## FormSubmissionResource

**الموقع:** `app/Filament/Resources/FormSubmissions/FormSubmissionResource.php`

**الغرض:** عرض وإدارة إرسالات الاستمارات

### Table Structure

#### Table Columns

| Column | Type | Settings | Notes |
|--------|------|----------|-------|
| form | TextColumn | relationship: form.title | اسم الاستمارة |
| read | IconColumn | boolean | هل تمت قراءتها |
| ip_address | TextColumn | copyable | عنوان IP |
| user_agent | TextColumn | toggleable | متصفح المستخدم |
| created_at | DateColumn | sortable | تاريخ الإرسال |

#### Table Filters

```
- SelectFilter: form (relationship)
- TernaryFilter: read (Yes/No/All)
```

#### Table Actions

```
- Toggle Read Status
- View (custom action)
```

### Form Structure (Read-only in Edit)

#### Section 1: معلومات الإرسالة

| Field | Type | Settings | Notes |
|-------|------|----------|-------|
| form_id | Select | disabled | الاستمارة |
| ip_address | TextInput | disabled | عنوان IP |
| user_agent | TextInput | disabled | متصفح المستخدم |
| read | Toggle | | هل تمت قراعتها |

#### Section 2: البيانات المرسلة

| Field | Type | Settings | Notes |
|-------|------|----------|-------|
| data | KeyValue | disabled | جميع بيانات الاستمارة |

---

## CommentResource

**الموقع:** `app/Filament/Resources/Comments/CommentResource.php`

**الغرض:** إدارة التعليقات على المقالات

### Table Structure

#### Table Columns

| Column | Type | Settings | Notes |
|--------|------|----------|-------|
| post | TextColumn | relationship: post.title | المقالة |
| author_name | TextColumn | searchable | اسم المُعلِّق |
| author_email | TextColumn | | البريد الإلكتروني |
| status | BadgeColumn | enum: CommentStatus | حالة التعليق |
| created_at | DateColumn | sortable | تاريخ التعليق |

#### Table Filters

```
- SelectFilter: status
- SelectFilter: post (relationship)
```

#### Table Actions

```
- Edit Action
- Delete Action
- Approve (bulk action)
- Reject (bulk action)
```

### Form Structure

#### Section 1: معلومات المُعلِّق

| Field | Type | Settings | Rules |
|-------|------|----------|-------|
| post_id | Select | relationship: posts, disabled in edit | required |
| author_name | TextInput | | required\|string |
| author_email | TextInput | email | required\|email |
| author_website | TextInput | url | nullable\|url |

#### Section 2: المحتوى والحالة

| Field | Type | Settings | Rules |
|-------|------|----------|-------|
| content | Textarea | | required\|string |
| status | Select | enum: CommentStatus | required |
| parent_id | Select | relationship: parent, nullable, searchable | nullable\|exists:comments,id |

---

## 🔧 قائمة التحقق من الإعدادات

### لكل Table Column

- [ ] هل الـ column قابل للبحث (searchable)؟
- [ ] هل الـ column قابل للترتيب (sortable)؟
- [ ] هل يعرض النوع الصحيح (TextColumn, BadgeColumn, etc.)؟
- [ ] هل يحتاج على تنسيق خاص (dates, numbers)؟
- [ ] هل يحتوي على relationship صحيح؟

### لكل Form Field

- [ ] هل الـ validation rules صحيحة؟
- [ ] هل الـ labels باللغة العربية؟
- [ ] هل الـ placeholders واضحة؟
- [ ] هل الـ required fields محددة بشكل صحيح؟
- [ ] هل الـ relationships مُعرّفة بشكل صحيح؟
- [ ] هل الـ enums مستخدمة بشكل صحيح؟

### لكل Resource

- [ ] هل تم تفعيل الـ Auto-discovery؟
- [ ] هل تم تحديد الـ Navigation Label؟
- [ ] هل تم تحديد الـ Navigation Icon؟
- [ ] هل تم تحديد الصلاحيات (policies) إن وجدت؟
- [ ] هل تم الاختبار في المتصفح؟

---

## 📝 ملاحظات مهمة

1. **الـ Slug Generator:** استخدم `SlugInput::make('slug')->from('title')` بدلاً من اليدوي
2. **الـ File Upload:** تأكد من تحديد `disk: 'public'` والمسار `directory: 'uploads'`
3. **الـ Builder:** استخدم نفس البنية في جميع Resources للمحتوى
4. **الـ Relationships:** استخدم `relationship()` للـ selects والـ repeaters
5. **الـ Enums:** استخدم `labels()` method للخيارات الديناميكية
6. **الـ Validation:** اجعل الـ rules في الـ migrations والـ models والـ forms متطابقة
7. **التسميات:** استخدم التسميات بالعربية في جميع الـ labels
8. **الألوان:** استخدم الألوان الـ Tailwind للـ badges والـ icons

---

**آخر تحديث:** 2025-10-24
**الإصدار:** 1.0 - بنية كاملة لـ Filament Resources
