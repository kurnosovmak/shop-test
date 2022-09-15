<!doctype html>
<html lang="<?php echo e(app()->getLocale()); ?>">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

        <title><?php echo e(isset($title) ? $title . ' | ' : ''); ?><?php echo e(config('app.name')); ?></title>

        <link href="https://fonts.googleapis.com/css2?family=Jost:wght@800&amp;family=Inter:wght@400;600&amp;display=swap" rel="stylesheet">
        <link rel="stylesheet" href="<?php echo e(asset('css/app.css')); ?>">

        <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
        <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
        <link rel="manifest" href="/site.webmanifest">
        <meta name="msapplication-TileColor" content="#d82827">
        <meta name="theme-color" content="#ffffff">
    </head>

    <body class="text-black bg-gray-100">
        <header class="sticky top-0 mx-auto max-w-6xl px-8 py-6 flex justify-between items-center bg-white border-b-2 border-gray-100">
            <a href="/" class="flex items-center">
                <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.logo','data' => ['class' => 'w-8 h-8 mr-4']]); ?>
<?php $component->withName('logo'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['class' => 'w-8 h-8 mr-4']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                <span class="font-display font-black uppercase text-xl tracking-wider">Laravel Shop</span>
            </a>
            <nav>
                <ul class="flex space-x-6">
                    <?php if(auth()->guard()->check()): ?>
                        <li><a class="hover:text-red-500 <?php echo e($title == 'Products' ? 'font-bold' : ''); ?>" href="<?php echo e(action(\App\Http\Controllers\Products\ProductIndexController::class)); ?>">Products</a></li>
                        <li><a class="hover:text-red-500 <?php echo e($title == 'My Orders' ? 'font-bold' : ''); ?>" href="<?php echo e(action(\App\Http\Controllers\Orders\OrderIndexController::class)); ?>">My Orders</a></li>
                        <li><a class="hover:text-red-500 <?php echo e($title == 'My Cart' ? 'font-bold' : ''); ?>" href="<?php echo e(action(\App\Http\Controllers\Cart\CartDetailController::class)); ?>">My Cart</a></li>
                        <li>
                            <form method="POST" action="<?php echo e(route('logout')); ?>">
                            <?php echo csrf_field(); ?>
                                <button class="inline hover:text-red-500">
                                    <?php echo e(__('Log out')); ?>

                                </button>
                            </form>
                        </li>
                    <?php else: ?>
                        <li><a class="hover:text-red-500" href="<?php echo e(route('login')); ?>">Log in</a></li>
                        <li><a class="hover:text-red-500" href="<?php echo e(route('register')); ?>">Register</a></li>
                    <?php endif; ?>
                </ul>
            </nav>
        </header>

        <main class="mx-auto max-w-6xl px-8 py-16 bg-white">
            <?php if(isset($breadcrumb)): ?>
                <?php echo e($breadcrumb); ?>

            <?php else: ?>
                <h1 class="mb-12 font-display text-4xl"><?php echo e($title ?? ''); ?></h1>
            <?php endif; ?>
            <?php echo e($slot); ?>

        </main>

        <footer class="mx-auto max-w-6xl px-8 py-16 text-sm text-center text-gray-500">
            Laravel Shop
        </footer>
    </body>
</html>
<?php /**PATH D:\PhpProjects\tz-domain\resources\views/layouts/app.blade.php ENDPATH**/ ?>