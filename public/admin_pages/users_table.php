<!DOCTYPE html>
<html>
<head>
    <title>Users Table</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.15/tailwind.min.css">
</head>
<body class="bg-gray-100">
    <div class="container mx-auto mt-8">
        <h1 class="text-2xl sm:text-3xl font-bold text-center mb-4">Users Table</h1>
        <div class="overflow-x-auto">
            <table class="table-auto w-full whitespace-no-wrap">
                <thead>
                    <tr>
                        <th class="px-4 py-2 border">ID</th>
                        <th class="px-4 py-2 border">First Name</th>
                        <th class="px-4 py-2 border">Last Name</th>
                        <th class="px-4 py-2 border">Password</th>
                        <th class="px-4 py-2 border">Date of Birth</th>
                        <th class="px-4 py-2 border">Age</th>
                        <th class="px-4 py-2 border">Gender</th>
                        <th class="px-4 py-2 border">Address</th>
                        <th class="px-4 py-2 border">Phone</th>
                        <th class="px-4 py-2 border">Email</th>
                        <th class="px-4 py-2 border">Status</th>
                        <th class="px-4 py-2 border">Registration Date</th>
                    </tr>
                </thead>
                <tbody id="userTableBody">
                </tbody>
            </table>
        </div>
    </div>
<!-- TODO complete this -->
    <script>
        // Fetch the data from PHP script
        fetch('./../../server/get_users.php')
            .then(response => console.log(JSON.parse(response.json())) )
            .then(data => {
                console.log(data);
                // Loop through the data and add it to the table
                data.forEach(user => {
                    const userRow = `
                        <tr>
                            <td class="border px-4 py-2">${user.id}</td>
                            <td class="border px-4 py-2">${user.first_name}</td>
                            <td class="border px-4 py-2">${user.last_name}</td>
                            <td class="border px-4 py-2">${user.password}</td>
                            <td class="border px-4 py-2">${user.dob}</td>
                            <td class="border px-4 py-2">${user.age}</td>
                            <td class="border px-4 py-2">${user.gender}</td>
                            <td class="border px-4 py-2">${user.address}</td>
                            <td class="border px-4 py-2">${user.phone}</td>
                            <td class="border px-4 py-2">${user.email}</td>
                            <td class="border px-4 py-2">${user.status}</td>
                            <td class="border px-4 py-2">${user.registration_date}</td>
                        </tr>
                    `;
                    document.querySelector('#userTableBody').insertAdjacentHTML('beforeend', userRow);
                });
            })
            .catch(error => console.error(error));
    </script>
</body>
</html>
