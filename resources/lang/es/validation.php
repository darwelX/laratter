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

    'accepted'             => 'El :attribute debe ser aceptado.',
    'active_url'           => 'El :attribute no es una URL valida.',
    'after'                => 'El :attribute debe ser una fecha mayor :date.',
    'after_or_equal'       => 'El :attribute debe ser una fecha mayor o igual a :date.',
    'alpha'                => 'El :attribute solo puede contener letras.',
    'alpha_dash'           => 'El :attribute solor debe contener letras, números, y guiones .',
    'alpha_num'            => 'El :attribute solo debe contener letras y números.',
    'array'                => 'El :attribute debe ser un arreglo.',
    'before'               => 'El :attribute debe ser una fecha menor :date.',
    'before_or_equal'      => 'El :attribute debeser una fecha menor o igual a :date.',
    'between'              => [
        'numeric' => 'El :attribute debe estar entre :min y :max.',
        'file'    => 'El :attribute debe estar entre :min y :max kilobytes.',
        'string'  => 'El :attribute debe estar entre :min y :max caracteres.',
        'array'   => 'El :attribute debe tener entre :min y :max items.',
    ],
    'boolean'              => 'El :attribute campo debe ser verdadero or falso.',
    'confirmed'            => 'El :attribute de confirmación no coincide.',
    'date'                 => 'El :attribute no es una fecha valida.',
    'date_format'          => 'El :attribute no coincide con el formato :format.',
    'different'            => 'El :attribute y :other debe ser diferente.',
    'digits'               => 'El :attribute debe ser :digits digitos.',
    'digits_between'       => 'El :attribute debe estar entre :min y :max digitos.',
    'dimensions'           => 'El :attribute tiene un tamaño invalido.',
    'distinct'             => 'El :attribute campo tiene un valor invalido.',
    'email'                => 'El :attribute debe ser una dirección de e-mail valida.',
    'exists'               => 'El :attribute seleccionado es invalido.',
    'file'                 => 'El :attribute debe ser un archivo.',
    'filled'               => 'El :attribute debe tener una valor.',
    'image'                => 'El :attribute debe ser una imagen.',
    'in'                   => 'El :attribute seleccionado es invalido.',
    'in_array'             => 'El :attribute campo no existe en :other.',
    'integer'              => 'El :attribute debe ser un entero.',
    'ip'                   => 'El :attribute debe ser una dirección IP valido.',
    'ipv4'                 => 'El :attribute debe ser una dirección IPv4 valida.',
    'ipv6'                 => 'El :attribute debe ser una dirección IPv6 valida.',
    'json'                 => 'El :attribute debe ser una cadena JSON valida.',
    'max'                  => [
        'numeric' => 'El :attribute no puede ser mayor que :max.',
        'file'    => 'El :attribute no puede ser mayor que :max kilobytes.',
        'string'  => 'El :attribute no puede ser mayor que :max caracteres.',
        'array'   => 'El :attribute no puede tener mas de :max items.',
    ],
    'mimes'                => 'El :attribute debe ser un archivo de tipo: :values.',
    'mimetypes'            => 'El :attribute debe ser un archivo de tipo: :values.',
    'min'                  => [
        'numeric' => 'El :attribute debe ser menor a :min.',
        'file'    => 'El :attribute debe ser menor a :min kilobytes.',
        'string'  => 'El :attribute debe ser menor a :min caracteres.',
        'array'   => 'El :attribute debe tener al menos :min items.',
    ],
    'not_in'               => 'El :attribute seleccionado es invalido.',
    'numeric'              => 'El :attribute debe ser un número.',
    'present'              => 'El :attribute campo debe estar presente.',
    'regex'                => 'El :attribute formato es invalido.',
    'required'             => 'El :attribute campo es requerido.',
    'required_if'          => 'El :attribute campo es requerido cuando :other es :value.',
    'required_unless'      => 'El :attribute campo es requerido al menos que :other es un :values.',
    'required_with'        => 'El :attribute campo es requerido cuando :values este presente.',
    'required_with_all'    => 'El :attribute campo es requerido cuando :values este presente.',
    'required_without'     => 'El :attribute campo es requerido cuando :values no este presente.',
    'required_without_all' => 'El :attribute cmapo es obligatorio cuando ninguno de :values esten presentes.',
    'same'                 => 'El :attribute y :other debe coincidir.',
    'size'                 => [
        'numeric' => 'El :attribute debe ser :size.',
        'file'    => 'El :attribute debe ser :size kilobytes.',
        'string'  => 'El :attribute debe ser :size caracteres.',
        'array'   => 'El :attribute debe contener :size items.',
    ],
    'string'               => 'El :attribute debe ser una cadena.',
    'timezone'             => 'El :attribute debe ser una zona valida.',
    'unique'               => 'El :attribute tiene que ser unico.',
    'uploaded'             => 'El :attribute fallo la carga.',
    'url'                  => 'El :attribute formato es invalido.',

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
