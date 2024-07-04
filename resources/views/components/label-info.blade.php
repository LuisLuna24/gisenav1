<div class="flex w-full justify-center items-center">
    <label for="cantidad_muestra" class="w-full" >{{ $title }}</label>
    <div class="tooltip">
        <span class="tooltip-icon">
            <svg xmlns="http://www.w3.org/2000/svg" width="19" height="19"
                viewBox="0 0 24 24" fill="none" stroke="currentColor"
                stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                class="icon icon-tabler icons-tabler-outline icon-tabler-help">
                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                <path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0" />
                <path d="M12 17l0 .01" />
                <path d="M12 13.5a1.5 1.5 0 0 1 1 -1.5a2.6 2.6 0 1 0 -3 -4" />
            </svg></span>
        <span class="tooltip-text">
            {{ $content }}</span>
    </div>
</div>

<style>
    .tooltip {
        position: relative;
        width: 100%;
        /* Required for positioning the tooltip */
    }

    .tooltip-icon {
        /* Style the icon as you like */
        display: inline-block;
        cursor: pointer;
        /* Make the icon clickable */
    }

    .tooltip-text {
        /* Style the tooltip content */
        visibility: hidden;
        /* Hide the tooltip by default */
        position: absolute;
        background-color: #333;
        color: #fff;
        padding: 2px;
        
        border-radius: 4px;
        /* Add more styles as needed */
    }

    /* Show the tooltip on hover */
    .tooltip:hover .tooltip-text {
        visibility: visible;
        /* Add more styles on hover as needed */
    }
</style>