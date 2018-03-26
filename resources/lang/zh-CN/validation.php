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

    'accepted'             => ':attribute必须是“接受”或类似状态',
    'active_url'           => ':attribute并不是一个有效的 URL',
    'after'                => ':attribute设定的时间必须在 :date 之后',
    'after_or_equal'       => ':attribute设定的时间必须在 :date 之后或与之相等',
    'alpha'                => ':attribute只允许包含字母',
    'alpha_dash'           => ':attribute只允许包含字母、数字与破折号（-）、下划线（_）',
    'alpha_num'            => ':attribute只允许包含字母与数字',
    'array'                => ':attribute必须是数组格式',
    'before'               => ':attribute必须在 :date 之前',
    'before_or_equal'      => ':attribute必须在 :date 之前或与之相等',
    'between'              => [
        'numeric' => ':attribute的大小必须介于 :min到:max 之间',
        'file'    => ':attribute的大小必须介于 :min到:max 之间',
        'string'  => ':attribute的长度必须介于 :min到:max 之间',
        'array'   => ':attribute must have between :min and :max items',
    ],
    'boolean'              => ':attribute 字段必须是布尔值',
    'confirmed'            => ':attribute 的两次输入并不相同',
    'date'                 => ':attribute 不是有效的日期',
    'date_format'          => ':attribute的格式必须与 :format 保持一致',
    'different'            => ':attribute and :other 必须是 different',
    'digits'               => ':attribute 必须是 :digits digits',
    'digits_between'       => ':attribute 必须介于 :min and :max digits',
    'dimensions'           => ':attribute has invalid image dimensions',
    'distinct'             => ':attribute field has a duplicate value',
    'email'                => ':attribute 必须是 a valid email address',
    'exists'               => 'selected :attribute is invalid',
    'file'                 => ':attribute 必须是 a file',
    'filled'               => ':attribute field must have a value',
    'image'                => ':attribute 必须是一张图片',
    'in'                   => 'selected :attribute is invalid',
    'in_array'             => ':attribute field does not exist in :other',
    'integer'              => ':attribute 必须是个整数',
    'ip'                   => ':attribute 必须是 a valid IP address',
    'ipv4'                 => ':attribute 必须是 a valid IPv4 address',
    'ipv6'                 => ':attribute 必须是 a valid IPv6 address',
    'json'                 => ':attribute 必须是 a valid JSON string',
    'max'                  => [
        'numeric' => ':attribute may not be greater than :max',
        'file'    => ':attribute may not be greater than :max kilobytes',
        'string'  => ':attribute may not be greater than :max characters',
        'array'   => ':attribute may not have more than :max items',
    ],
    'mimes'                => ':attribute 必须是 a file of type: :values',
    'mimetypes'            => ':attribute 必须是 a file of type: :values',
    'min'                  => [
        'numeric' => ':attribute 必须是 at least :min',
        'file'    => ':attribute 必须是 at least :min kilobytes',
        'string'  => ':attribute 必须是 at least :min characters',
        'array'   => ':attribute must have at least :min items',
    ],
    'not_in'               => 'selected :attribute is invalid',
    'numeric'              => ':attribute必须是数字',
    'present'              => ':attribute field 必须是 present',
    'regex'                => ':attribute 格式 is invalid',
    'required'             => ':attribute 请勿为空',
    'required_if'          => ':attribute field is required when :other is :value',
    'required_unless'      => ':attribute field is required unless :other is in :values',
    'required_with'        => ':attribute field is required when :values is present',
    'required_with_all'    => ':attribute field is required when :values is present',
    'required_without'     => ':attribute field is required when :values is not present',
    'required_without_all' => ':attribute field is required when none of :values are present',
    'same'                 => ':attribute 与 :other 必须匹配',
    'size'                 => [
        'numeric' => ':attribute 必须为 :size',
        'file'    => ':attribute 必须为 :size 千字节(Kb)',
        'string'  => ':attribute 必须为 :size 字符',
        'array'   => ':attribute 必须包含 :size 个项目',
    ],
    'string'               => ':attribute 必须是字符串或文本格式',
    'timezone'             => ':attribute 必须是有效的时区标识符',
    'unique'               => ':attribute 的值已经存在',
    'uploaded'             => ':attribute 上传失败',
    'url'                  => ':attribute 的格式是无效的',

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
    | The following language lines are used to swap attribute place-holders
    | with something more reader friendly such as E-Mail Address instead
    | of "email". This simply helps us make messages a little cleaner.
    |
    */

    'attributes' => [],

];
