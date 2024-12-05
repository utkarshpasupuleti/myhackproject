<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VPNController extends Controller
{
    public function connect(Request $request)
    {
        // Since VPN is removed, simply return a success message
        return response()->json([
            'message' => 'User connected successfully!',
            'status' => 'connected'
        ]);
    }

    public function getPublicIp()
    {
        // Get the current public IP address of the server
        $output = shell_exec('curl -4 ifconfig.me 2>/dev/null');

        if ($output === null) {
            return response()->json([
                'message' => 'Error retrieving public IP',
            ], 500);
        }

        return response()->json([
            'public_ip' => trim($output),
        ]);
    }

    public function spawnMachine()
    {
        // Example logic to spawn a machine and return its IP (replace with actual logic)
        $ipAddress = 'ping 10.11.81.118'; // Replace this with actual machine IP spawning logic
        return response()->json(['ip' => $ipAddress]);
    }

    public function checkFlag(Request $request)
    {
        $validated = $request->validate([
            'userInput' => 'required|string',
        ]);

        // Example of a flag (you may replace this with your own validation logic)
        $expectedFlag = 'MHP{jhjaksb,xkbackhlodscnlkcuxhcyudsbcjyhciudsc}';

        if ($validated['userInput'] === $expectedFlag) {
            return response()->json(['status' => 'success']);
        } else {
            return response()->json(['status' => 'error', 'message' => 'Incorrect flag.']);
        }
    }
}
