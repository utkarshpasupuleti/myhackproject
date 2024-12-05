<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Your description">
    <meta name="author" content="Your name">
    <title>MyHackProject</title>

    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="icon" href="images/favicon.png">
    @include("home.styles")
</head>
<body class="bg-gray-100">

@include("home.mainpreloader")

<!-- Main Content (Initially hidden) -->
<div id="main-content" class="hidden-content">
    <div class="header-container">
        @include("home.navbar")
    </div>

    @include("home.herobadge")
    

    <!-- Info Section -->
    <div class="container mx-auto p-4 space-y-6">

<div class="bg-white shadow-lg rounded-lg p-6 transition-transform transform hover:scale-105">
         <!-- OpenVPN Installation Section -->
         <section class="mb-16">
            <h2 class="text-2xl font-semibold text-blue-500">In Case You Don't Have OpenVPN Installed</h2>
            <p class="mt-4">Follow these steps to install OpenVPN and Easy-RSA if you haven't already done so.</p>

            <h3 class="mt-6 text-lg font-semibold">Step 1: Install OpenVPN and Easy-RSA</h3>
            <p class="mt-4">Easy-RSA is a tool that helps you generate the necessary SSL certificates for your OpenVPN setup.</p>
            <pre class="mt-4 bg-gray-800 text-white p-4 rounded-md overflow-x-auto"><code>sudo apt update</code></pre>
            <pre class="mt-4 bg-gray-800 text-white p-4 rounded-md overflow-x-auto"><code>sudo apt install openvpn easy-rsa</code></pre>

            <h3 class="mt-6 text-lg font-semibold">Step 2: Set Up the Certificate Authority (CA)</h3>
            <p class="mt-4">You'll need to create a certificate authority (CA) that will sign your OpenVPN server and client certificates.</p>
            <h4 class="mt-4 text-md font-semibold">Create the Easy-RSA Directory</h4>
            <pre class="mt-4 bg-gray-800 text-white p-4 rounded-md overflow-x-auto"><code>make-cadir ~/openvpn-ca</code></pre>
            <pre class="mt-4 bg-gray-800 text-white p-4 rounded-md overflow-x-auto"><code>cd ~/openvpn-ca</code></pre>
            
            <h4 class="mt-4 text-md font-semibold">Initialize the Easy-RSA Environment</h4>
            <pre class="mt-4 bg-gray-800 text-white p-4 rounded-md overflow-x-auto"><code>cp -r /usr/share/easy-rsa/* ./</code></pre>

            <h4 class="mt-4 text-md font-semibold">Edit the Vars File</h4>
            <p class="mt-4">Open the <code>vars</code> file and modify it to your liking (you can leave most fields as defaults if you're unsure).</p>
            <pre class="mt-4 bg-gray-800 text-white p-4 rounded-md overflow-x-auto"><code>nano vars</code></pre>
            <p class="mt-4">Make sure to set the following parameters in the <code>vars</code> file:</p>
            <ul class="list-disc pl-6 mt-4">
                <li><code>export KEY_COUNTRY</code></li>
                <li><code>export KEY_PROVINCE</code></li>
                <li><code>export KEY_CITY</code></li>
                <li><code>export KEY_ORG</code></li>
                <li><code>export KEY_EMAIL</code></li>
            </ul>

            <h4 class="mt-4 text-md font-semibold">Source the Vars File</h4>
            <pre class="mt-4 bg-gray-800 text-white p-4 rounded-md overflow-x-auto"><code>source vars</code></pre>

            <h4 class="mt-4 text-md font-semibold">Clean the Environment</h4>
            <pre class="mt-4 bg-gray-800 text-white p-4 rounded-md overflow-x-auto"><code>./clean-all</code></pre>

            <h4 class="mt-4 text-md font-semibold">Build the Certificate Authority</h4>
            <pre class="mt-4 bg-gray-800 text-white p-4 rounded-md overflow-x-auto"><code>./build-ca</code></pre>
            <p class="mt-4">Follow the prompts to generate the CA certificate (<code>ca.crt</code>) and private key (<code>ca.key</code>), which will be used to sign both the server and client certificates.</p>

            <h3 class="mt-6 text-lg font-semibold">Step 3: Generate Server and Client Certificates</h3>
            <h4 class="mt-4 text-md font-semibold">Generate the Server Certificate and Key</h4>
            <pre class="mt-4 bg-gray-800 text-white p-4 rounded-md overflow-x-auto"><code>./build-key-server server</code></pre>
            <p class="mt-4">This will create the server certificate (<code>server.crt</code>), private key (<code>server.key</code>), and other necessary files.</p>

            <h4 class="mt-4 text-md font-semibold">Generate the Diffie-Hellman Parameters</h4>
            <pre class="mt-4 bg-gray-800 text-white p-4 rounded-md overflow-x-auto"><code>./build-dh</code></pre>

            <h4 class="mt-4 text-md font-semibold">Generate a Shared Secret for TLS Authentication</h4>
            <pre class="mt-4 bg-gray-800 text-white p-4 rounded-md overflow-x-auto"><code>openvpn --genkey --secret ta.key</code></pre>

            <h4 class="mt-4 text-md font-semibold">Generate Client Certificates</h4>
            <p class="mt-4">To create a client certificate for each client that will connect to your OpenVPN server, use the following command (replace <code>clientname</code> with a unique name for each client):</p>
            <pre class="mt-4 bg-gray-800 text-white p-4 rounded-md overflow-x-auto"><code>./build-key clientname</code></pre>

            <h3 class="mt-6 text-lg font-semibold">Step 4: Configure the OpenVPN Server</h3>
            <h4 class="mt-4 text-md font-semibold">Copy the Certificates and Keys</h4>
            <pre class="mt-4 bg-gray-800 text-white p-4 rounded-md overflow-x-auto"><code>sudo cp ~/openvpn-ca/keys/{server.crt,server.key,ca.crt,dh2048.pem,ta.key} /etc/openvpn/</code></pre>

            <h4 class="mt-4 text-md font-semibold">Create the OpenVPN Server Configuration File</h4>
            <pre class="mt-4 bg-gray-800 text-white p-4 rounded-md overflow-x-auto"><code>sudo cp /usr/share/doc/openvpn/examples/sample-config-files/server.conf.gz /etc/openvpn/</code></pre>
            <pre class="mt-4 bg-gray-800 text-white p-4 rounded-md overflow-x-auto"><code>sudo gunzip /etc/openvpn/server.conf.gz</code></pre>
            <pre class="mt-4 bg-gray-800 text-white p-4 rounded-md overflow-x-auto"><code>sudo nano /etc/openvpn/server.conf</code></pre>
            <p class="mt-4">Edit the <code>server.conf</code> file to make the following changes:</p>
            <ul class="list-disc pl-6 mt-4">
                <li>Uncomment <code>tls-auth ta.key 0</code> for HMAC authentication.</li>
                <li>Set the correct paths for the certificate and key files (e.g., <code>ca /etc/openvpn/ca.crt</code>).</li>
                <li>Change the VPN subnet if necessary (e.g., <code>server 10.8.0.0 255.255.255.0</code>).</li>
                <li>Enable <code>push "redirect-gateway def1 bypass-dhcp"</code> to route all client traffic through the VPN.</li>
                <li>Enable <code>user nobody</code> and <code>group nogroup</code> for security.</li>
            </ul>

            <h4 class="mt-4 text-md font-semibold">Enable IP Forwarding</h4>
            <pre class="mt-4 bg-gray-800 text-white p-4 rounded-md overflow-x-auto"><code>sudo nano /etc/sysctl.conf</code></pre>
            <p class="mt-4">Uncomment the line <code>net.ipv4.ip_forward=1</code> and apply the change:</p>
            <pre class="mt-4 bg-gray-800 text-white p-4 rounded-md overflow-x-auto"><code>sudo sysctl -p</code></pre>

            <h4 class="mt-4 text-md font-semibold">Set Up Firewall Rules</h4>
            <pre class="mt-4 bg-gray-800 text-white p-4 rounded-md overflow-x-auto"><code>sudo ufw allow 1194/udp</code></pre>
            <pre class="mt-4 bg-gray-800 text-white p-4 rounded-md overflow-x-auto"><code>sudo ufw default allow routed</code></pre>
            <pre class="mt-4 bg-gray-800 text-white p-4 rounded-md overflow-x-auto"><code>sudo ufw enable</code></pre>

            <h3 class="mt-6 text-lg font-semibold">Step 5: Start and Enable OpenVPN</h3>
            <pre class="mt-4 bg-gray-800 text-white p-4 rounded-md overflow-x-auto"><code>sudo systemctl start openvpn@server</code></pre>
            <pre class="mt-4 bg-gray-800 text-white p-4 rounded-md overflow-x-auto"><code>sudo systemctl enable openvpn@server</code></pre>

            <h3 class="mt-6 text-lg font-semibold">Step 6: Configure Client</h3>
            <p class="mt-4">Create a client configuration file (<code>client.ovpn</code>) for each client that will connect to the server:</p>
            <pre class="mt-4 bg-gray-800 text-white p-4 rounded-md overflow-x-auto"><code>client
dev tun
proto udp
remote &lt;server_ip&gt; 1194
resolv-retry infinite
nobind
persist-key
persist-tun
ca ca.crt
cert clientname.crt
key clientname.key
remote-cert-tls server
tls-auth ta.key 1
comp-lzo
verb 3</code></pre>

            <p class="mt-4">Transfer the following files to the client machine:</p>
            <ul class="list-disc pl-6">
                <li><code>clientname.crt</code></li>
                <li><code>clientname.key</code></li>
                <li><code>ca.crt</code></li>
                <li><code>ta.key</code></li>
            </ul>

            <h3 class="mt-6 text-lg font-semibold">Step 7: Test the VPN</h3>
            <pre class="mt-4 bg-gray-800 text-white p-4 rounded-md overflow-x-auto"><code>sudo openvpn --config client.ovpn</code></pre>
            <p class="mt-4">This should establish a secure VPN connection to your server.</p>
        </section>
    </div>
    <div class="bg-white shadow-lg rounded-lg p-6 transition-transform transform hover:scale-105">
    <section class="mb-16">
    <h1 class="text-3xl font-bold text-blue-600">Step-by-Step Guide to Simulate a Network Using Network Namespaces</h1>

            <h2 class="text-2xl font-semibold text-blue-500">Step 1: Install Required Packages</h2>
            <p class="mt-4">Ensure that <code>iproute2</code> is installed on your system, as it provides the necessary tools for working with network namespaces. Most Ubuntu systems come with it pre-installed, but you can check and install it if needed.</p>

            <pre class="mt-4 bg-gray-800 text-white p-4 rounded-md overflow-x-auto"><code>sudo apt update</code></pre>
            <pre class="mt-4 bg-gray-800 text-white p-4 rounded-md overflow-x-auto"><code>sudo apt install iproute2</code></pre>

            <h2 class="mt-8 text-2xl font-semibold text-blue-500">Step 2: Create a Network Namespace</h2>
            <p class="mt-4">Now let's create a network namespace. You can name it anything you want, but in this example, we'll use <code>ns1</code>.</p>

            <h3 class="mt-4 text-lg font-semibold">1. Create the Network Namespace</h3>
            <pre class="mt-4 bg-gray-800 text-white p-4 rounded-md overflow-x-auto"><code>sudo ip netns add ns1</code></pre>

            <h3 class="mt-4 text-lg font-semibold">2. Verify the Namespace</h3>
            <p class="mt-4">To ensure the namespace was created successfully, run the following command:</p>
            <pre class="mt-4 bg-gray-800 text-white p-4 rounded-md overflow-x-auto"><code>ip netns list</code></pre>

            <h2 class="mt-8 text-2xl font-semibold text-blue-500">Step 3: Create a Virtual Ethernet Pair</h2>
            <p class="mt-4">A virtual ethernet pair consists of two connected virtual network interfaces. Let's create them now.</p>

            <h3 class="mt-4 text-lg font-semibold">1. Create the Virtual Ethernet Pair</h3>
            <pre class="mt-4 bg-gray-800 text-white p-4 rounded-md overflow-x-auto"><code>sudo ip link add veth0 type veth peer name veth1</code></pre>

            <h3 class="mt-4 text-lg font-semibold">2. Assign One End to the Namespace</h3>
            <p class="mt-4">Next, we'll move <code>veth1</code> into the <code>ns1</code> namespace:</p>
            <pre class="mt-4 bg-gray-800 text-white p-4 rounded-md overflow-x-auto"><code>sudo ip link set veth1 netns ns1</code></pre>

            <h2 class="mt-8 text-2xl font-semibold text-blue-500">Step 4: Configure the Network Interfaces</h2>
            <p class="mt-4">Now we will configure the IP addresses for the virtual network interfaces and bring them up.</p>

            <h3 class="mt-4 text-lg font-semibold">1. Assign IP Addresses</h3>
            <p class="mt-4">Assign an IP address to each virtual interface:</p>
            <pre class="mt-4 bg-gray-800 text-white p-4 rounded-md overflow-x-auto"><code>sudo ip addr add 10.11.81.1/24 dev veth0</code></pre>
            <pre class="mt-4 bg-gray-800 text-white p-4 rounded-md overflow-x-auto"><code>sudo ip netns exec ns1 ip addr add 10.11.81.118/24 dev veth1</code></pre>

            <h3 class="mt-4 text-lg font-semibold">2. Bring Up the Interfaces</h3>
            <p class="mt-4">Bring up both interfaces:</p>
            <pre class="mt-4 bg-gray-800 text-white p-4 rounded-md overflow-x-auto"><code>sudo ip link set veth0 up</code></pre>
            <pre class="mt-4 bg-gray-800 text-white p-4 rounded-md overflow-x-auto"><code>sudo ip netns exec ns1 ip link set veth1 up</code></pre>

            <h3 class="mt-4 text-lg font-semibold">3. Enable the Loopback Interface</h3>
            <p class="mt-4">Enable the loopback interface inside the namespace:</p>
            <pre class="mt-4 bg-gray-800 text-white p-4 rounded-md overflow-x-auto"><code>sudo ip netns exec ns1 ip link set lo up</code></pre>

            <h2 class="mt-8 text-2xl font-semibold text-blue-500">Step 5: Start an HTTP Server in the Namespace</h2>
            <p class="mt-4">Next, let's set up a simple HTTP server within the namespace to simulate serving files over the network.</p>

            <h3 class="mt-4 text-lg font-semibold">1. Install Python (if not already installed)</h3>
            <p class="mt-4">If Python is not yet installed, install it with the following command:</p>
            <pre class="mt-4 bg-gray-800 text-white p-4 rounded-md overflow-x-auto"><code>sudo apt install python3</code></pre>

            <h3 class="mt-4 text-lg font-semibold">2. Create the <code>flag.txt</code> File</h3>
            <p class="mt-4">Next, create the directory in the namespace where you'll serve the <code>flag.txt</code> file:</p>
            <pre class="mt-4 bg-gray-800 text-white p-4 rounded-md overflow-x-auto"><code>sudo mkdir -p /tmp/ns1</code></pre>
            <pre class="mt-4 bg-gray-800 text-white p-4 rounded-md overflow-x-auto"><code>echo "MHP{jhjaksb,xkbackhlodscnlkcuxhcyudsbcjyhciudsc}" | sudo tee /tmp/ns1/flag.txt</code></pre>

            <h3 class="mt-4 text-lg font-semibold">3. Start the HTTP Server</h3>
            <p class="mt-4">Now, start the HTTP server in the namespace:</p>
            <pre class="mt-4 bg-gray-800 text-white p-4 rounded-md overflow-x-auto"><code>sudo ip netns exec ns1 python3 -m http.server 8080 --directory /tmp/ns1</code></pre>

            <h2 class="mt-8 text-2xl font-semibold text-blue-500">Step 6: Access the Server</h2>
            <p class="mt-4">Now that the server is running, you can access it from both the host machine and within the namespace.</p>

            <h3 class="mt-4 text-lg font-semibold">2. From Within the Namespace</h3>
            <p class="mt-4">You can also access the server from within the namespace itself by running:</p>
            <pre class="mt-4 bg-gray-800 text-white p-4 rounded-md overflow-x-auto"><code>sudo ip netns exec ns1 curl http://10.11.81.118:8080/flag.txt</code></pre>

        </section>
</div>



    </div>

    @include("home.footer")
</div>

@include("home.scripts")
</div>

</body>
</html>
