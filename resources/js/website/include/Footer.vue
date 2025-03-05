<template>
    <footer class="footer">
        <div class="container">
            <!-- Middle Section: INPATH LMS & Navigation -->
            <div class="row text-light py-4">
                <div class="col-md-3">
                    <h6>INPATH LMS</h6>
                    <ul class="list-unstyled">
                        <li><a href="#">Home</a></li>
                        <li><a href="#">Overview</a></li>
                        <li><a href="#">Features</a></li>
                        <li><a href="#">Pricing</a></li>
                        <li><a href="#">About Us</a></li>
                        <li><a href="#">Careers</a></li>
                    </ul>
                </div>
                <div class="col-md-3">
                    <h6>Learn</h6>
                    <ul class="list-unstyled">
                        <li><a href="#">Courses</a></li>
                        <li><a href="#">Learning Paths</a></li>
                        <li><a href="#">FAQs</a></li>
                    </ul>
                </div>
                <div class="col-md-3">
                    <h6>For Teams</h6>
                    <ul class="list-unstyled">
                        <li><a href="#">Corporate Training</a></li>
                        <li><a href="#">Custom Solutions</a></li>
                        <li><a href="#">Onboarding Programs</a></li>
                    </ul>
                </div>
                <div class="col-md-3">
                    <h6>Resources</h6>
                    <ul class="list-unstyled">
                        <li><a href="#">Blog</a></li>
                        <li><a href="#">Help Center</a></li>
                        <li><a href="#">Free Resources</a></li>
                        <li><a href="#">Terms of Service</a></li>
                        <li><a href="#">Privacy Policy</a></li>
                    </ul>
                </div>
            </div>

            <!-- Bottom Section: Logo & Copyright -->
            <div class="d-flex justify-content-between align-items-center text-light py-3 border-top">
                <div>
                    <img src="logo.png" alt="Logo" style="height: 30px;">
                </div>
                <p class="mb-0">© 2025 INPATH LMS, Inc.</p>
            </div>
        </div>
    </footer>

</template>

<style scoped>
.footer {
    background-color:  #361d67;
    color: #b5b6b8;
    font-size: 14px;
}

.footer a {
    color: #b5b6b8;
    text-decoration: none;
}

.footer a:hover {
    color: #ffffff;
}

.footer .border-top {
    border-color: rgba(255, 255, 255, 0.1) !important;
}

.footer h6 {
    font-size: 16px;
    font-weight: bold;
}

.footer ul {
    padding-left: 0;
}

.footer ul li {
    list-style: none;
    margin-bottom: 6px;
}
    
</style>