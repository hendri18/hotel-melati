<template>
    <div class="page">
        <nav class='navbar navbar-dark bg-dark'>
            <div class='container'>
                <router-link :to="{ name: 'home' }" class="navbar-brand">Hotel Melati</router-link>
            </div>
        </nav>
        <div class="container content">
            <router-view></router-view>
        </div>
    </div>
</template>