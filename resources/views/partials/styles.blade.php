<style lang="scss">
    @import url('https://fonts.googleapis.com/css2?family=Prompt:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;1,100;1,200;1,300;1,400;1,500;1,600;1,700&display=swap');

    body {
        font-family: 'Prompt', sans-serif;
    }

    /* color variable */
    :root {
        --primary-color: rgb(99 102 241);
        --secondary-color: #fff;
        /* --secondary-color: rgb(199 210 254); */
        --tertiary-color: rgb(30 27 75);
        --quaternary-color: #fff;
    }

    .bg-sidebar {
        background: var(--secondary-color);
    }

    .cta-btn {
        color: #3d68ff;
    }

    .logout-btn {
        background-color: var(--primary-color);
    }

    .logout-btn:hover {
        background: rgb(79 70 229);
    }

    .active-nav-link {
        background-color: var(--quaternary-color);
        color: var(--primary-color);
    }

    .nav-item:hover {
        background-color: rgb(238 242 255);
        color: var(--primary-color);
    }

    .ell-1 {
        display: block;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    .line-clamp-1 {
        overflow: hidden;
        display: -webkit-box;
        -webkit-box-orient: vertical;
        -webkit-line-clamp: 1;
    }

    .line-clamp-2 {
        overflow: hidden;
        display: -webkit-box;
        -webkit-box-orient: vertical;
        -webkit-line-clamp: 2;
    }

    .line-clamp-3 {
        overflow: hidden;
        display: -webkit-box;
        -webkit-box-orient: vertical;
        -webkit-line-clamp: 3;
    }

    .line-clamp-4 {
        overflow: hidden;
        display: -webkit-box;
        -webkit-box-orient: vertical;
        -webkit-line-clamp: 4;
    }

    input[type="number"]::-webkit-inner-spin-button,
    input[type="number"]::-webkit-outer-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }
</style>
