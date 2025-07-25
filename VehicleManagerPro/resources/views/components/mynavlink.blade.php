@props(['active' => false])

<li>
<a {{ $attributes}}

@class([
      'block py-2 px-3 rounded  md:p-0 ',
      'text-white bg-red-500 md:bg-transparent md:text-red-500 md:dark:text-red-800' => $active,
      'text-gray-900 hover:bg-gray-100 md:hover:bg-transparent md:hover:text-red-500 md:dark:hover:text-red-800 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700' => ! $active,
      
    ]) aria-current="page">{{$slot}}</a>
</li>