<template>
    <div class="d-flex flex-column vh-100">
        <nav-bar></nav-bar>
        <main class="flex-shrink-0">
            <slot></slot>
        </main>

        <app-footer></app-footer>
    </div>
</template>

<script>
import NavBar from '@/Shared/NavBar';
import AppFooter from '@/Shared/AppFooter';

export default {
    components: {
        NavBar,
        AppFooter
    }
}
</script>
