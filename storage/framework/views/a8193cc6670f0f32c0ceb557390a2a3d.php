<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Executive Access | LUXELENS</title>
    <link href="https://fonts.bunny.net/css?family=playfair-display:400,700,900|inter:100,300,400,600" rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        :root {
            --gold: #E1C564;
            --dark: #050505;
        }

        body {
            font-family: 'Inter', sans-serif;
            background-color: var(--dark);
            margin: 0;
            overflow: hidden;
        }

        .playfair {
            font-family: 'Playfair Display', serif;
        }

        /* Background Cinematic */
        .admin-bg {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            /* Ganti dengan foto backstage studio atau kamera gear yang dark */
            background: linear-gradient(rgba(0, 0, 0, 0.8), rgba(0, 0, 0, 0.9)),
                url('https://images.unsplash.com/photo-1492691523567-61707d2e5ef6?q=80&w=2070&auto=format&fit=crop');
            background-size: cover;
            background-position: center;
            filter: grayscale(100%) contrast(110%);
            z-index: -1;
        }

        /* Glassmorphism Card */
        .login-glass {
            background: rgba(15, 15, 15, 0.7);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(225, 197, 100, 0.1);
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.5);
        }

        .input-underlined {
            background: transparent !important;
            border: none !important;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1) !important;
            border-radius: 0 !important;
            transition: all 0.4s ease;
        }

        .input-underlined:focus {
            border-bottom-color: var(--gold) !important;
            padding-left: 10px !important;
            box-shadow: none !important;
        }

        .btn-admin {
            background: var(--gold);
            color: black;
            letter-spacing: 4px;
            font-weight: 800;
            transition: all 0.5s cubic-bezier(0.19, 1, 0.22, 1);
        }

        .btn-admin:hover {
            background: white;
            transform: translateY(-3px);
            box-shadow: 0 10px 20px rgba(225, 197, 100, 0.2);
        }

        .reveal {
            animation: fadeIn 1.5s ease forwards;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
</head>

<body class="flex items-center justify-center h-screen">
    <div class="admin-bg"></div>

    <div class="login-glass w-full max-w-md p-12 rounded-sm reveal">
        <div class="text-center mb-12">
            <h1 class="playfair text-3xl font-black tracking-tighter text-[#E1C564]">
                PROJECT<span class="text-white">SIM</span><span class="text-[#E1C564]">.</span>
            </h1>
            <div class="flex items-center justify-center gap-3 mt-2">
                <div class="h-1px w-8 bg-[#E1C564]/30"></div>
                <p class="text-10px tracking-[0.5em] text-white/40 uppercase">Executive Panel</p>
                <div class="h-1px w-8 bg-[#E1C564]/30"></div>
            </div>
        </div>

        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(session('error')): ?>
            <div class="bg-red-500/10 border-l-2 border-red-500 p-3 mb-8">
                <p class="text-red-500 text-[11px] font-bold uppercase tracking-widest"><?php echo e(session('error')); ?></p>
            </div>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

        <form action="/admin/login" method="POST" class="space-y-10">
            <?php echo csrf_field(); ?>
            <div class="space-y-2">
                <label class="text-[9px] uppercase tracking-[0.3em] text-[#E1C564]/60 font-bold ml-1">Identity</label>
                <input type="text" name="username" placeholder="ADMIN USERNAME" required
                    class="input-underlined w-full py-3 text-white text-sm focus:outline-none placeholder:text-white/5 uppercase tracking-widest">
            </div>

            <div class="space-y-2">
                <label class="text-[9px] uppercase tracking-[0.3em] text-[#E1C564]/60 font-bold ml-1">Access
                    Code</label>
                <input type="password" name="password" placeholder="••••••••" required
                    class="input-underlined w-full py-3 text-white text-sm focus:outline-none placeholder:text-white/5">
            </div>

            <div class="pt-4">
                <button type="submit" class="btn-admin w-full py-5 text-[11px] uppercase rounded-sm">
                    Enter Dashboard
                </button>
            </div>
        </form>

        <div class="mt-12 text-center">
            <a href="/"
                class="text-[9px] tracking-[0.4em] text-white/20 hover:text-[#E1C564] transition duration-500 uppercase">
                &larr; Back to Main Gallery
            </a>
        </div>
    </div>

    <div class="fixed bottom-10 right-10 flex items-center gap-4 opacity-20">
        <p class="text-[10px] tracking-[0.6em] text-white uppercase">System Access • 2026</p>
    </div>
</body>

</html>
<?php /**PATH D:\laragon\www\ProjectSIM\resources\views/admin-login.blade.php ENDPATH**/ ?>