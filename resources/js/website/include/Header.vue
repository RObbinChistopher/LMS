<template>
    <div class="w-header">
        <div class="px-4 py-2 mt-3">
            <div class="row">
                <div class="col-md-1">
                    <router-link to="/">
                        <img src="https://inpath.us/assets/nav-logo-CE8cHYc_.png" style="width: 100%;" alt="">
                    </router-link>
                </div>
                <div class="col-md-7">
                    <div class="flex-base">
                        <p class="wtext">Explore</p>
                        <div class="w-search-container">
                            <input type="search" id="w-search-input" class="form-control ds-input"
                                placeholder="Search..." autocomplete="off" spellcheck="false" role="combobox"
                                aria-autocomplete="list" aria-expanded="false" aria-owns="autocomplete-listbox"
                                dir="auto">
                            <span class="w-search-icon"><i class="fa-solid fa-magnifying-glass"></i></span>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="flex-start">
                        <p class="wtext">Inpath Business</p>
                        <p class="wtext">Instructor</p>
                        <p class="wtext">My Learning</p>

                        <!-- Icons with Notification Dots -->
                        <div class="icon-container">
                            <i class="fa-regular fa-heart"></i>
                            <span class="notification-dot"></span>
                        </div>
                        <div class="icon-container">
                            <i class="fa-solid fa-cart-shopping"></i>
                            <span class="notification-dot"></span>
                        </div>
                        <div class="icon-container">
                            <i class="fa-solid fa-bell"></i>
                            <span class="notification-dot"></span>
                        </div>

                        <div class="w-profile-image">
                            <img src="../../../../public/images/user.jpg" style="width: 100%;" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <hr class="mb-0">
        <div class="container">
            <div class="flex-base gap-0">
                <div class="category">
                    <p class="wtext mt-3">Development</p>
                    <div class="dropdown">
                        <div class="subcategory">
                            <router-link to="/topic">Web Development</router-link>
                            <router-link to="/topic">Data Science</router-link>
                            <router-link to="/topic">Mobile Development</router-link>
                            <router-link to="/topic">Programming Languages</router-link>
                            <router-link to="/topic">Game Development</router-link>
                            <router-link to="/topic">Database Design & Development</router-link>
                            <router-link to="/topic">Software Testing</router-link>
                        </div>
                    </div>
                </div>
                <div class="category">
                    <p class="wtext mt-3">Business</p>
                    <div class="dropdown">
                        <div class="subcategory">
                            <router-link to="/topic">Entrepreneurship</router-link>
                            <router-link to="/topic">Communication</router-link>
                            <router-link to="/topic">Management</router-link>
                            <router-link to="/topic">Sales</router-link>
                            <router-link to="/topic">Business Strategy</router-link>
                            <router-link to="/topic">Operations</router-link>
                            <router-link to="/topic">Project Management</router-link>
                            <router-link to="/topic">Business Law</router-link>
                            <router-link to="/topic">Business Analytics & Intelligence</router-link>
                        </div>
                    </div>
                </div>
                <div class="category">
                    <p class="wtext mt-3">Finance & Accounting</p>
                    <div class="dropdown">
                        <div class="subcategory">
                            <router-link to="/topic">Accounting & Bookkeeping</router-link>
                            <router-link to="/topic">Cryptocurrency & Blockchain</router-link>
                            <router-link to="/topic">Finance</router-link>
                            <router-link to="/topic">Financial Modeling & Analysis</router-link>
                            <router-link to="/topic">Investing & Trading</router-link>
                        </div>
                    </div>
                </div>
                <div class="category">
                    <p class="wtext mt-3">IT & Software</p>
                    <div class="dropdown">
                        <div class="subcategory">
                            <router-link to="/topic">IT Certifications</router-link>
                            <router-link to="/topic">Network & Security</router-link>
                            <router-link to="/topic">Hardware</router-link>
                            <router-link to="/topic">Operating Systems & Servers</router-link>
                            <router-link to="/topic">Other IT & Software</router-link>
                        </div>
                    </div>
                </div>
                <div class="category">
                    <p class="wtext mt-3">Office Productivity</p>
                    <div class="dropdown">
                        <div class="subcategory">
                            <router-link to="/topic">Accounting & Bookkeeping</router-link>
                            <router-link to="/topic">Cryptocurrency & Blockchain</router-link>
                            <router-link to="/topic">Finance</router-link>
                            <router-link to="/topic">Financial Modeling & Analysis</router-link>
                            <router-link to="/topic">Investing & Trading</router-link>
                        </div>
                    </div>
                </div>
                <div class="category">
                    <p class="wtext mt-3">Personal Development</p>
                    <div class="dropdown">
                        <div class="subcategory">
                            <router-link to="/topic">Entrepreneurship</router-link>
                            <router-link to="/topic">Communication</router-link>
                            <router-link to="/topic">Management</router-link>
                            <router-link to="/topic">Sales</router-link>
                            <router-link to="/topic">Business Strategy</router-link>
                            <router-link to="/topic">Operations</router-link>
                            <router-link to="/topic">Project Management</router-link>
                            <router-link to="/topic">Business Law</router-link>
                            <router-link to="/topic">Business Analytics & Intelligence</router-link>
                        </div>
                    </div>
                </div>
                <div class="category">
                    <p class="wtext mt-3">Design</p>
                    <div class="dropdown">
                        <div class="subcategory">
                            <router-link to="/topic">Accounting & Bookkeeping</router-link>
                            <router-link to="/topic">Cryptocurrency & Blockchain</router-link>
                            <router-link to="/topic">Finance</router-link>
                            <router-link to="/topic">Financial Modeling & Analysis</router-link>
                            <router-link to="/topic">Investing & Trading</router-link>
                        </div>
                    </div>
                </div>
                <div class="category">
                    <p class="wtext mt-3">Marketing</p>
                    <div class="dropdown">
                        <div class="subcategory">
                            <router-link to="/topic">IT Certifications</router-link>
                            <router-link to="/topic">Network & Security</router-link>
                            <router-link to="/topic">Hardware</router-link>
                            <router-link to="/topic">Operating Systems & Servers</router-link>
                            <router-link to="/topic">Other IT & Software</router-link>
                        </div>
                    </div>
                </div>
                <div class="category">
                    <p class="wtext mt-3">Health & Fitness</p>
                    <div class="dropdown">
                        <div class="subcategory">
                            <router-link to="/topic">IT Certifications</router-link>
                            <router-link to="/topic">Network & Security</router-link>
                            <router-link to="/topic">Hardware</router-link>
                            <router-link to="/topic">Operating Systems & Servers</router-link>
                            <router-link to="/topic">Other IT & Software</router-link>
                        </div>
                    </div>
                </div>
                <div class="category">
                    <p class="wtext mt-3">Music</p>
                    <div class="dropdown">
                        <div class="subcategory">
                            <router-link to="/topic">Entrepreneurship</router-link>
                            <router-link to="/topic">Communication</router-link>
                            <router-link to="/topic">Management</router-link>
                            <router-link to="/topic">Sales</router-link>
                            <router-link to="/topic">Business Strategy</router-link>
                            <router-link to="/topic">Operations</router-link>
                            <router-link to="/topic">Project Management</router-link>
                            <router-link to="/topic">Business Law</router-link>
                            <router-link to="/topic">Business Analytics & Intelligence</router-link>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<style scoped>
* {
    overflow: visible !important;
}

.subcategory {
    display: flex;
    flex-direction: column;
    gap: 10px;
}

.subcategory>a {
    color: black;
    text-decoration: none;
}

.w-header {
    overflow-x: hidden;
    position: relative;
    /* Ensure it's above other elements */
    z-index: 3000;
    /* Higher than carousel */
}

.flex-start {
    display: flex;
    gap: 24px;
    justify-content: flex-start;
    align-items: baseline;
}

.flex-base {
    display: flex;
    gap: 25px;
    justify-content: center;
    align-items: baseline;
}

.w-profile-image {
    width: 40px;
    height: 40px;
    border-radius: 50%;
    overflow: hidden;
}

.header {
    font-size: x-large;
}

.w-search-container {
    position: relative;
    width: 100%;
}

.w-search-icon {
    position: absolute;
    top: 50%;
    left: 10px;
    transform: translateY(-50%);
    font-size: 14px;
    color: #888;
}

#w-search-input {
    padding-left: 40px;
    background: #1d2630;
    border: 2px solid #5d6e78 !important;
    box-shadow: none;
    color: black !important;
    border-radius: 21px;
}

/* ICON CONTAINER */
.icon-container {
    position: relative;
    display: inline-block;
}

/* NOTIFICATION DOT */
.notification-dot {
    position: absolute;
    top: 0;
    right: 0;
    width: 8px;
    height: 8px;
    background-color: #00bcd4;
    border-radius: 50%;
}

/* CATEGORY HOVER EFFECT */
.category {
    position: relative;
    cursor: pointer;
    transition: background-color 0.3s ease;
    padding: 0px 15px;
    z-index: 3100;
    /* Higher than carousel */
}

.category:hover {
    background-color: #6ee0fb8c;
    color: #00bcd4 !important;
}


.dropdown {
    display: none;
    position: absolute;
    top: 100%;
    left: 0;
    background: white;
    padding: 10px 20px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    border-radius: 4px;
    text-align: left;
    font-weight: bold;
    z-index: 9999;
    white-space: nowrap;
}


/* Prevent dropdown from overflowing on last items */
.category:last-child .dropdown {
    left: auto;
    right: 0;
    transform: translateX(0);
}

/* SHOW DROPDOWN ON HOVER */
.category:hover .dropdown {
    display: block;
}
</style>
