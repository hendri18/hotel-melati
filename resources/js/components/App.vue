<template>
    <div class="page">
        <div class="loading-container"><div class="lds-ring"><div></div><div></div><div></div><div></div></div></div>
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