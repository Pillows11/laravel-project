<a {{ $attributes }}
    class="{{ $active ? 'bg-gray-700 text-white' : 'text-gray-300 hover:bg-gray-300 hover:text-white' }} block rounded-md  px-3 py-2 text-sm font-medium "
    aria-current={{ $active ? 'page' : false }}>{{ $slot }}</a>
