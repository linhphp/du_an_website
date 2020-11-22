<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    'accepted' => ':attribute phải được chấp nhận.',
    'active_url' => ':attribute không phải là một URL hợp lệ.',
    'after' => ':attribute phải là ngày sau: ngày.',
    'after_or_equal' => ':attribute phải là một ngày sau hoặc bằng: ngày.',
    'alpha' => ':attribute có thể chỉ chứa các chữ cái.',
    'alpha_dash' => ':attribute chỉ có thể chứa các chữ cái, số, dấu gạch ngang và dấu gạch dưới.',
    'alpha_num' => ':attribute chỉ có thể chứa các chữ cái và số.',
    'array' => ':attribute phải là một mảng.',
    'before' => ':attribute phải là một ngày trước: ngày.',
    'before_or_equal' => ':attribute phải là ngày trước hoặc bằng: date.',
    'between' => [
        'numeric' => ':attribute phải nằm giữa: min và: max.',
        'file' => ':attribute phải nằm trong khoảng: min và: max kilobyte.',
        'string' => ':attribute phải nằm giữa các ký tự: min và: max.',
        'array' => ':attribute phải có các mục giữa: min và: max.',
    ],
    'boolean' => ':attribute trường phải đúng hoặc sai.',
    'confirmed' => ':attribute nhận đinh không phù hợp.',
    'date' => ':attribute Không phải là ngày hợp lệ.',
    'date_equals' => ':attribute phải là một ngày bằng: date.',
    'date_format' => ':attribute không phù hợp với format: định dạng.',
    'different' => ':attribute và :other phải khác.',
    'digits' => ':attribute cần phải :digits chữ số.',
    'digits_between' => ':attribute phải nằm trong khoảng :min chữ số và :max.',
    'dimensions' => ':attribute có kích thước hình ảnh không hợp lệ.',
    'distinct' => ':attribute trường có giá trị trùng lặp.',
    'email' => ':attribute Phải la một địa chỉ email hợp lệ.',
    'ends_with' => ':attribute phải kết thúc bằng một trong các giá trị sau:.',
    'exists' => 'Đã chọn :attribute Không hợp lệ.',
    'file' => ':attribute phải là một tệp.',
    'filled' => ':attribute trường phải có một giá trị.',
    'gt' => [
        'numeric' => ':attribute phải lớn hơn :value.',
        'file' => ':attribute phải lớn hơn :value kilobyte.',
        'string' => ':attribute phải lớn hơn :value ký tự.',
        'array' => ':attribute phải có nhiều hơn :value mục.',
    ],
    'gte' => [
        'numeric' => ':attribute phải lớn hơn hoặc bằng :value.',
        'file' => ':attribute phải lớn hơn hoặc bằng :value kilobyte.',
        'string' => ':attribute phải lớn hơn hoặc bằng :value ký tự',
        'array' => ':attribute phải có :value vật phẩm trở lên.',
    ],
    'image' => 'The :attribute must be an image.',
    'in' => 'The selected :attribute is invalid.',
    'in_array' => 'The :attribute field does not exist in :other.',
    'integer' => 'The :attribute must be an integer.',
    'ip' => 'The :attribute must be a valid IP address.',
    'ipv4' => 'The :attribute must be a valid IPv4 address.',
    'ipv6' => 'The :attribute must be a valid IPv6 address.',
    'json' => 'The :attribute must be a valid JSON string.',
    'lt' => [
        'numeric' => 'The :attribute must be less than :value.',
        'file' => 'The :attribute must be less than :value kilobytes.',
        'string' => 'The :attribute must be less than :value characters.',
        'array' => 'The :attribute must have less than :value items.',
    ],
    'lte' => [
        'numeric' => 'The :attribute must be less than or equal :value.',
        'file' => 'The :attribute must be less than or equal :value kilobytes.',
        'string' => 'The :attribute must be less than or equal :value characters.',
        'array' => 'The :attribute must not have more than :value items.',
    ],
    'max' => [
        'numeric' => 'The :attribute may not be greater than :max.',
        'file' => 'The :attribute may not be greater than :max kilobytes.',
        'string' => 'The :attribute may not be greater than :max characters.',
        'array' => 'The :attribute may not have more than :max items.',
    ],
    'mimes' => 'The :attribute must be a file of type: :values.',
    'mimetypes' => 'The :attribute must be a file of type: :values.',
    'min' => [
        'numeric' => 'The :attribute must be at least :min.',
        'file' => 'The :attribute must be at least :min kilobytes.',
        'string' => 'The :attribute must be at least :min characters.',
        'array' => 'The :attribute must have at least :min items.',
    ],
    'not_in' => 'The selected :attribute is invalid.',
    'not_regex' => 'The :attribute format is invalid.',
    'numeric' => ':attribute phải là một số.',
    'password' => 'password là không chính xác.',
    'present' => ':attribute trường phải có mặt.',
    'regex' => ':attribute định dạng không hợp lệ.',
    'required' => ':attribute lĩnh vực được yêu cầu.',
    'required_if' => ':attribute trường là bắt buộc khi: khác là: giá trị.',
    'required_unless' => ':attribute trường là bắt buộc trừ khi: khác nằm trong: giá trị.',
    'required_with' => ':attribute trường là bắt buộc khi: có giá trị.',
    'required_with_all' => ':attribute trường là bắt buộc khi: có giá trị.',
    'required_without' => ':attribute trường là bắt buộc khi: không có giá trị.',
    'required_without_all' => ':attribute trường là bắt buộc khi không có giá trị nào trong số.',
    'same' => ':attribute và :other phải phù hợp.',
    'size' => [
        'numeric' => ':attribute phải là: kích thước.',
        'file' => ':attribute phải là: kích thước kilobyte.',
        'string' => ':attribute phải là: ký tự kích thước.',
        'array' => ':attribute phải chứa: mục kích thước.',
    ],
    'starts_with' => ':attribute phải bắt đầu bằng một trong các giá trị sau:.',
    'string' => ':attribute phải là một chuỗi.',
    'timezone' => ':attribute phải là một vùng hợp lệ.',
    'unique' => ':attribute đã được thực hiện.',
    'uploaded' => ':attribute không tải lên được.',
    'url' => 'The :attribute định dạng không hợp lệ.',
    'uuid' => ':attribute phải là một UUID hợp lệ.',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap our attribute placeholder
    | with something more reader friendly such as "E-Mail Address" instead
    | of "email". This simply helps us make our message more expressive.
    |
    */

    'attributes' => [],

];
