<button
    {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center px-4 py-2 bg-yellowPersonalLight dark:bg-blue-200 border border-transparent rounded-md font-semibold text-sm text-white dark:text-gray-800 uppercase tracking-widest hover:bg-yellowPersonal dark:hover:bg-white focus:bg-yellowPersonal dark:focus:bg-white active:bg-yellowPersonal dark:active:bg-blue-300 focus:outline-none focus:ring-2 focus:ring-yellowPersonal focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
