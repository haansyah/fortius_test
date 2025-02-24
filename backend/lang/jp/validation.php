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

    'accepted' => ':attribute は受け入れられる必要があります。',
    'accepted_if' => ':attribute は、:other が :value の場合に受け入れられる必要があります。',
    'active_url' => ':attribute は有効な URL ではありません。',
    'after' => ':attribute は、:date より後の日付にする必要があります。',
    'after_or_equal' => ':attribute は、:date より後の日付にする必要があります。',
    'alpha' => ':attribute には文字のみを含める必要があります。',
    'alpha_dash' => ':attribute には、文字、数字、ダッシュ、アンダースコアのみを含める必要があります。',
    'alpha_num' => ':attribute には、文字と数字のみを含める必要があります。',
    'array' => ':attribute は配列。',
    'ascii' => ':attribute には、1 バイトの英数字と記号のみを含めることができます。',
    'before' => ':attribute は、:date より前の日付である必要があります。',
    'before_or_equal' => ':attribute は、:date より前の日付である必要があります。',
    'between' => [
        'array' => ':attribute には、:min から :max の項目が必要です。',
        'file' => ':attribute は、:min から :max キロバイトである必要があります。',
        'numeric' => ':attribute は、:min から :max キロバイトである必要があります。',
        'string' => ':attribute は、:min から :max 文字である必要があります。',
    ],
    'boolean' => ' :attribute フィールドは true または false である必要があります。',
    'confirmed' => ':attribute の確認が一致しません。',
    'current_password' => 'パスワードが正しくありません。',
    'date' => ':attribute は有効な日付ではありません。',
    'date_equals' => ':attribute は :date と同じ日付である必要があります。',
    'date_format' => ':attribute は形式 :format と一致しません。',
    'declined' => ':attribute は拒否する必要があります。',
    'declined_if' => ':other が :value の場合、:attribute は拒否する必要があります。',
    'different' => ':attribute と :other は異なる必要があります。',
    'digits' => ':attribute は :digits である必要がありますdigits.',
    'digits_between' => ':attribute は :min から :max の桁数でなければなりません。',
    'dimensions' => ':attribute に無効な画像寸法があります。',
    'distinct' => ':attribute フィールドに重複した値があります。',
    'doesnt_end_with' => ':attribute は次のいずれかで終わってはいけません: :values.',
    'doesnt_start_with' => ':attribute は次のいずれかで始まってはいけません: :values.',
    'email' => ':attribute は有効なメール アドレスでなければなりません。',
    'ends_with' => ':attribute は次のいずれかで終わってはいけません: :values.',
    'enum' => '選択された :attribute は無効です。',
    'exists' => '選択された :attribute は無効です。',
    'file' => ':attribute はファイルである必要があります。',
    'filled' => ':attribute フィールドには値が必要です。',
    'gt' => [
        'array' => ':attribute には :value 項目以上が必要です。',
        'file' => ':attribute は :value キロバイト以上である必要があります。',
        'numeric' => ':attribute は :value より大きくなければなりません。',
        'string' => ':attribute は :value 文字以上である必要があります。',
    ],
    'gte' => [
        'array' => ':attribute には :value 項目以上が必要です。',
        'file' => ':attribute は:value キロバイト。',
        '数値' => ':attribute は :value 以上である必要があります。',
        '文字列' => ':attribute は :value 文字以上である必要があります。',
    ],
    'image' => ':attribute は画像である必要があります。',
    'in' => '選択された :attribute は無効です。',
    'in_array' => ':attribute フィールドは :other に存在しません。',
    'integer' => ':attribute は整数である必要があります。',
    'ip' => ':attribute は有効な IP アドレスである必要があります。',
    'ipv4' => ':attribute は有効な IPv4 アドレスである必要があります。',
    'ipv6' => ':attribute は有効な IPv6 アドレスである必要があります。',
    'json' => ':attribute は有効な JSON 文字列である必要があります。',
    'lowercase' => ':attribute は小文字である必要があります。',
    'lt' => [
        'array' => ' :attribute には :value 項目未満が必要です。',
        'file' => ':attribute は :value キロバイト未満である必要があります。',
        'numeric' => ':attribute は :value 文字未満である必要があります。',
        'string' => ':attribute は :value 文字未満である必要があります。',
    ],
    'lte' => [
        'array' => ':attribute には :value 項目以上を含めることはできません。',
        'file' => ':attribute は :value キロバイト以下である必要があります。',
        'numeric' => ':attribute は :value 文字以下である必要があります。',
        'string' => ':attribute は :value 文字以下である必要があります。',
    ],
    'mac_address' => ' :attribute は有効な MAC アドレスである必要があります。',
    'max' => [
        'array' => ':attribute には :max 項目を超える項目を含めることはできません。',
        'file' => ':attribute には :max キロバイトを超える項目を含めることはできません。',
        'numeric' => ':attribute には :max を超える項目を含めることはできません。',
        'string' => ':attribute には :max 文字を超える項目を含めることはできません。',
    ],
    'max_digits' => ':attribute には :max 桁を超える項目を含めることはできません。',
    'mimes' => ':attribute には、タイプ: :values のファイルを指定する必要があります。',
    'mimetypes' => ':attribute には、タイプ: :values のファイルを指定する必要があります。',
    'min' => [
        'array' => ':attribute には少なくとも :min 項目が必要です。',
        'file' => ':attribute には少なくとも :min キロバイトが必要です。',
        'numeric' => ':attribute には少なくとも :min が必要です。',
        'string' => ':attribute には少なくとも :min 文字が必要です。',
    ],
    'min_digits' => ':attribute には少なくとも :min 桁が必要です。',
    'multiple_of' => ':attribute は :value の倍数である必要があります。',
    'not_in' => '選択された :attribute は無効です。',
    'not_regex' => ':attribute の形式が無効です。',
    'numeric' => ':attribute は数値である必要があります。',
    'password' => [
        'letters' => ':attribute には少なくとも 1 つの文字が含まれている必要があります。',
        'mixed' => ':attribute には少なくとも 1 つの大文字と小文字が含まれている必要があります。',
        'numbers' => ':attribute には少なくとも 1 つの数字が含まれている必要があります。',
        'symbols' => ':attribute には少なくとも 1 つのシンボル。',
        'uncompromised' => '指定された :attribute がデータ漏洩に発生しました。別の :attribute を選択してください。',
    ],
    'present' => ':attribute フィールドが存在する必要があります。',
    'prohibited' => ':attribute フィールドは禁止されています。',
    'prohibited_if' => ':other が :value の場合、:attribute フィールドは禁止されています。',
    'prohibited_unless' => ':other が :values に含まれていない場合、:attribute フィールドは禁止されています。',
    'prohibits' => ':attribute フィールドでは :other が存在することが禁止されています。',
    'regex' => ':attribute 形式が無効です。',
    'required' => ':attribute フィールドは必須です。',
    'required_array_keys' => ':attribute フィールドには :values のエントリが含まれている必要があります。',
    'required_if' => ':other が :value の場合、:attribute フィールドは必須です。',
    'required_if_accepted' => ':other が受け入れられる場合、:attribute フィールドは必須です。',
    'required_unless' => ':other が :values に含まれていない場合、:attribute フィールドは必須です。',
    'required_with' => ':values が存在する場合、:attribute フィールドは必須です。',
    'required_with_all' => ':values が存在する場合、:attribute フィールドは必須です。',
    'required_without' => ':values が存在しない場合、:attribute フィールドは必須です。',
    'required_without_all' => ':values がいずれも存在しない場合、:attribute フィールドは必須です。',
    'same' => ':attribute と :other一致する必要があります。',
    'size' => [
        'array' => ':attribute には :size 個の項目が含まれている必要があります。',
        'file' => ':attribute は :size キロバイトである必要があります。',
        'numeric' => ':attribute は :size である必要があります。',
        'string' => ':attribute は :size 文字である必要があります。',
    ],
    'starts_with' => ':attribute は次のいずれかで始まっている必要があります: :values。',
    'string' => ':attribute は文字列である必要があります。',
    'timezone' => ':attribute は有効なタイムゾーンである必要があります。',
    'unique' => ':attribute はすでに使用されています。',
    'uploaded' => ':attribute のアップロードに失敗しました。',
    'uppercase' => ':attribute は大文字である必要があります。',
    'url' => ':attribute は有効な URL である必要があります。',
    'ulid' => ':attribute は有効な ULID である必要があります。',
    'uuid' => ':attribute は有効な UUID である必要があります。',

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
