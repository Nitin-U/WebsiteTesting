        const togglePassword = document.getElementById("togglePassword");
        const password = document.getElementById("password");
        var i=0;

        togglePassword.addEventListener("click", toggleFunction);

        function toggleFunction()
        {
            // toggle the type attribute
            const type = password.getAttribute("type") === "password" ? "text" : "password";
            password.setAttribute("type", type);
            
            // toggle the icon
            if(i==0)
            {
            	this.classList.replace("fa-eye-slash","fa-eye");
    			i=1;
            }
            else
            {
            	this.classList.replace("fa-eye","fa-eye-slash");
    			i=0;
            }
        };

        // prevent form submit
        const form = document.querySelector("form");
        form.addEventListener('submit', function (e) {
            e.preventDefault();
        });