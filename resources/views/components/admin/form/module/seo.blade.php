<fieldset>
    <legend>موارد سئو</legend>

    @component('components.admin.form.input',['title'=>'کنونیکال','name'=>'canonical','value'=>isset($variable_Seo["canonical"]) ? $variable_Seo["canonical"] : old("canonical")])@endcomponent
    @component('components.admin.form.input',['title'=>'ریدایرکت','name'=>'redirect','value'=>isset($variable_Seo["redirect"]) ? $variable_Seo["redirect"] : old("redirect")])@endcomponent
    @component('components.admin.form.select',['title'=>'نوع ریدایرکت','id'=>'redirect_kind','name'=>'redirect_kind','value'=>isset($variable_Seo["redirect_kind"]) ? $variable_Seo["redirect_kind"] : old("redirect_kind"),'array'=>$redirect_kinds])@endcomponent
    @component('components.admin.form.select',['title'=>'ایندکس','id'=>'robots','name'=>'robots','array'=>$index_type,'value'=>isset($variable_Seo["robots"]) ? $variable_Seo["robots"] : old("robots")])@endcomponent
    @component('components.admin.form.input',['title'=>'h1','id'=>'h1','name'=>'h1','value'=>isset($variable_Seo["h1"]) ? $variable_Seo["h1"] : old("h1")])@endcomponent
    @component('components.admin.form.input',['title'=>'آدرس سئو','id'=>'url_seo','name'=>'url_seo','value'=>isset($variable_Seo["url_seo"]) ? $variable_Seo["url_seo"] : old("url_seo")])@endcomponent
    @component('components.admin.form.input',['title'=>'عنوان سئو','id'=>'title_seo','name'=>'title_seo','value'=>isset($variable_Seo["title_seo"]) ? $variable_Seo["title_seo"] : old("title_seo")])@endcomponent
    @component('components.admin.form.meta_keywords',['title'=>'متاتگ کلمات کلیدی','id'=>'meta_keywords','name'=>'meta_keywords','value'=>isset($variable_Seo["meta_keywords"]) ? $variable_Seo["meta_keywords"] : old("meta_keywords")])@endcomponent
    @component('components.admin.form.textarea',['title'=>'متاتگ توضیحات','id'=>'meta_description','name'=>'meta_description','value'=>isset($variable_Seo["meta_description"]) ? $variable_Seo["meta_description"] : old("meta_description")])@endcomponent

</fieldset>


