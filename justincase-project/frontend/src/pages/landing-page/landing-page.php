<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>JustinCase</title>

  <!-- Tailwindcss CDN -->
  <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>

  <link
    href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700&display=swap"
    rel="stylesheet" />
  <link rel="stylesheet" href="../../styles/landing-page.css" />
</head>

<body>
  <div class="min-h-screen">
    <main class="flex-1">
      <header id="main-header" class="sticky top-0 bg-white p-2 shadow-md z-50">
        <div class="mx-auto max-w-screen-xl px-4 sm:px-6 lg:px-1">
          <div class="flex h-16 items-center justify-between">
            <div class="md:flex md:items-center md:gap-12">
              <a
                class="flex title-font font-medium items-center text-gray-900 mb-4 md:mb-0">
                <span class="ml-2 text-2xl text-[#0D6EFF] font-extrabold">
                  Just<span class="text-yellow-300">In</span>Case
                </span>
              </a>
            </div>

            <div class="hidden md:block">
              <nav aria-label="Global">
                <ul class="flex items-center gap-10 text-sm">
                  <li>
                    <a
                      class="text-gray-950 text-base font-medium transition hover:text-[#0D6EFF]"
                      href="#Home">
                      Home
                    </a>
                  </li>

                  <li>
                    <a
                      class="text-gray-950 text-base font-medium transition hover:text-[#0D6EFF]"
                      href="#Features">
                      Features
                    </a>
                  </li>

                  <li>
                    <a
                      class="text-gray-950 text-base font-medium transition hover:text-[#0D6EFF]"
                      href="#How-It-Works">
                      How It Works
                    </a>
                  </li>

                  <li>
                    <a
                      class="scroll-p-10 text-gray-950 text-base font-medium transition hover:text-[#0D6EFF]"
                      href="#Portal">
                      Portals
                    </a>
                  </li>
                </ul>
              </nav>
            </div>

            <div class="flex items-center gap-4">
              <div class="sm:flex sm:gap-4">
                <button
                  type="button"
                  class="rounded-lg border border-gray-300 bg-white px-5 py-2.5 text-center text-sm font-medium text-gray-700 shadow-sm transition-all hover:bg-gray-100">
                  <a href="../login-and-register/login-register.php"> Login </a>
                </button>

                <div class="hidden sm:flex">
                  <button
                    type="button"
                    class="rounded-lg text-white bg-[#0D6EFF] hover:bg-blue-600 px-5 py-2.5 text-center text-sm font-medium text-gray-700 shadow-sm transition-all">
                    <a href="../login-and-register/login-register.php"> Get Started </a>
                  </button>
                </div>
              </div>

              <div class="block md:hidden">
                <button
                  class="rounded-sm bg-gray-100 p-2 text-gray-600 transition hover:text-gray-600/75">
                  <svg
                    xmlns="http://www.w3.org/2000/svg"
                    class="size-5"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor"
                    stroke-width="2">
                    <path
                      stroke-linecap="round"
                      stroke-linejoin="round"
                      d="M4 6h16M4 12h16M4 18h16" />
                  </svg>
                </button>
              </div>
            </div>
          </div>
        </div>
      </header>

      <section
        id="Home"
        class="text-white bg-gradient-to-r from-blue-600 via-blue-500 to-blue-400 min-h-screen">
        <div
          class="container mx-auto flex px-5 py-50 items-center justify-center flex-col">
          <div class="text-center lg:w-2/3 w-full">
            <h1 class="title-font sm:text-8xl mb-3 font-bold text-white">
              Reserve with Ease, Return with
              <span class="text-[#FFFF00]">Peace</span>.
            </h1>
            <p
              class="my-9 leading-relaxed font-semibold text-lg sm:text-2xl md:text-3xl text-blue-100 opacity-85">
              A seamless campus device lending platform that connects students
              with the technology they need, when they need it.
            </p>
            <div class="flex justify-center">
              <button
                type="button"
                class="mr-5 py-3 px-4 inline-flex items-center gap-x-2 text-lg font-semibold rounded-lg border border-transparent bg-[#FFFF00] text-[#0C0C0C] hover:bg-[#ffff00e3] shadow-lg cursor-pointer">
                Borrow A Device
              </button>
              <button
                type="button"
                class="py-3 px-4 inline-flex items-center gap-x-2 text-lg font-semibold rounded-lg border border-transparent bg-[#4992FF] hover:bg-[#4992ffa4] text-white shadow-lg cursor-pointer">
                Learn More
              </button>
            </div>
          </div>
        </div>
      </section>

      <section id="Portal" class="text-gray-600 body-font">
        <h1
          class="sm:text-3xl text-2xl font-bold title-font text-center text-gray-900 mb-10 mt-20">
          Tailored for Students, Built by Students
          <br class="hidden sm:block" />
          <span class="text-blue-500 font-medium"> Just In Case Portal</span>
          <br />
        </h1>
        <div
          class="container px-5 pb-24 mx-auto flex flex-wrap justify-center">
          <div class="flex flex-col lg:flex-row w-full gap-8">
            <div class="p-4 sm:w-1/2 md:w-full">
              <div
                class="flex border-2 rounded-lg border-gray-200 border-opacity-50 p-8 sm:flex-row flex-col">
                <div
                  class="w-16 h-16 sm:mr-8 sm:mb-0 mb-4 inline-flex items-center justify-center rounded-full bg-blue-100 text-blue-500 flex-shrink-0">
                  <svg
                    fill="none"
                    stroke="currentColor"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    class="w-8 h-8"
                    viewBox="0 0 24 24">
                    <path d="M22 12h-4l-3 9L9 3l-3 9H2"></path>
                  </svg>
                </div>
                <div class="flex-grow">
                  <h2
                    class="text-gray-900 text-xl title-font font-semibold mb-3">
                    For Students
                  </h2>
                  <ul class="space-y-3 pt-1">
                    <li class="flex gap-3">
                      <svg
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 24 24"
                        strokeWidth="{1.5}"
                        stroke="currentColor"
                        class="h-5 w-5 text-primary-500 flex-shrink-0">
                        <path
                          strokeLinecap="round"
                          strokeLinejoin="round"
                          d="M4.5 12.75l6 6 9-13.5" />
                      </svg>
                      Quick access to essential devices for your projects
                    </li>
                    <li class="flex gap-3">
                      <svg
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 24 24"
                        strokeWidth="{1.5}"
                        stroke="currentColor"
                        class="h-5 w-5 text-primary-500 flex-shrink-0">
                        <path
                          strokeLinecap="round"
                          strokeLinejoin="round"
                          d="M4.5 12.75l6 6 9-13.5" />
                      </svg>
                      Clear return policies and deadlines
                    </li>
                    <li class="flex gap-3">
                      <svg
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 24 24"
                        strokeWidth="{1.5}"
                        stroke="currentColor"
                        class="h-5 w-5 text-primary-500 flex-shrink-0">
                        <path
                          strokeLinecap="round"
                          strokeLinejoin="round"
                          d="M4.5 12.75l6 6 9-13.5" />
                      </svg>
                      View your borrowing history
                    </li>
                    <li class="flex gap-3">
                      <svg
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 24 24"
                        strokeWidth="{1.5}"
                        stroke="currentColor"
                        class="h-5 w-5 text-primary-500 flex-shrink-0">
                        <path
                          strokeLinecap="round"
                          strokeLinejoin="round"
                          d="M4.5 12.75l6 6 9-13.5" />
                      </svg>
                      Get notified about device availability
                    </li>
                    <li class="flex gap-3">
                      <svg
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 24 24"
                        strokeWidth="{1.5}"
                        stroke="currentColor"
                        class="h-5 w-5 text-primary-500 flex-shrink-0">
                        <path
                          strokeLinecap="round"
                          strokeLinejoin="round"
                          d="M4.5 12.75l6 6 9-13.5" />
                      </svg>
                      Seamless extension requests when needed
                    </li>
                  </ul>
                  <a class="mt-3 text-blue-500 inline-flex items-center pt-1">
                    Learn More
                    <svg
                      fill="none"
                      stroke="currentColor"
                      stroke-linecap="round"
                      stroke-linejoin="round"
                      stroke-width="2"
                      class="w-4 h-4 ml-2"
                      viewBox="0 0 24 24">
                      <path d="M5 12h14M12 5l7 7-7 7"></path>
                    </svg>
                  </a>
                </div>
              </div>
            </div>
            <div class="p-4 sm:w-1/2 md:w-full">
              <div
                class="flex border-2 rounded-lg border-gray-200 border-opacity-50 p-8 sm:flex-row flex-col">
                <div
                  class="w-16 h-16 sm:mr-8 sm:mb-0 mb-4 inline-flex items-center justify-center rounded-full bg-blue-100 text-blue-500 flex-shrink-0">
                  <svg
                    fill="none"
                    stroke="currentColor"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    class="w-8 h-8"
                    viewBox="0 0 24 24">
                    <path d="M22 12h-4l-3 9L9 3l-3 9H2"></path>
                  </svg>
                </div>
                <div class="flex-grow">
                  <h2
                    class="text-gray-900 text-xl title-font font-semibold mb-3">
                    For Faculty
                  </h2>
                  <ul class="space-y-3 pt-1">
                    <li class="flex gap-3">
                      <svg
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 24 24"
                        strokeWidth="{1.5}"
                        stroke="currentColor"
                        class="h-5 w-5 text-primary-500 flex-shrink-0">
                        <path
                          strokeLinecap="round"
                          strokeLinejoin="round"
                          d="M4.5 12.75l6 6 9-13.5" />
                      </svg>
                      Manage all device inventory from one dashboard
                    </li>
                    <li class="flex gap-3">
                      <svg
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 24 24"
                        strokeWidth="{1.5}"
                        stroke="currentColor"
                        class="h-5 w-5 text-primary-500 flex-shrink-0">
                        <path
                          strokeLinecap="round"
                          strokeLinejoin="round"
                          d="M4.5 12.75l6 6 9-13.5" />
                      </svg>
                      Track lending status and device conditions
                    </li>
                    <li class="flex gap-3">
                      <svg
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 24 24"
                        strokeWidth="{1.5}"
                        stroke="currentColor"
                        class="h-5 w-5 text-primary-500 flex-shrink-0">
                        <path
                          strokeLinecap="round"
                          strokeLinejoin="round"
                          d="M4.5 12.75l6 6 9-13.5" />
                      </svg>
                      Approve or decline requests
                    </li>
                    <li class="flex gap-3">
                      <svg
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 24 24"
                        strokeWidth="{1.5}"
                        stroke="currentColor"
                        class="h-5 w-5 text-primary-500 flex-shrink-0">
                        <path
                          strokeLinecap="round"
                          strokeLinejoin="round"
                          d="M4.5 12.75l6 6 9-13.5" />
                      </svg>
                      Generate reports on usage patterns
                    </li>
                    <li class="flex gap-3">
                      <svg
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 24 24"
                        strokeWidth="{1.5}"
                        stroke="currentColor"
                        class="h-5 w-5 text-primary-500 flex-shrink-0">
                        <path
                          strokeLinecap="round"
                          strokeLinejoin="round"
                          d="M4.5 12.75l6 6 9-13.5" />
                      </svg>
                      Set availability schedules for different devices
                    </li>
                  </ul>
                  <a class="mt-3 text-blue-500 inline-flex items-center pt-1">
                    Learn More
                    <svg
                      fill="none"
                      stroke="currentColor"
                      stroke-linecap="round"
                      stroke-linejoin="round"
                      stroke-width="2"
                      class="w-4 h-4 ml-2"
                      viewBox="0 0 24 24">
                      <path d="M5 12h14M12 5l7 7-7 7"></path>
                    </svg>
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>

      <section id="How-It-Works" class="text-gray-600 body-font bg-[#F5F5F8]">
        <div class="container px-5 py-24 mx-auto flex flex-wrap">
          <div
            class="flex relative pt-10 pb-20 sm:items-center md:w-2/3 mx-auto">
            <div
              class="h-full w-6 absolute inset-0 flex items-center justify-center">
              <div class="h-full w-1 bg-gray-200 pointer-events-none"></div>
            </div>
            <div
              class="flex-shrink-0 w-6 h-6 rounded-full mt-10 sm:mt-0 inline-flex items-center justify-center bg-blue-500 text-white relative z-10 title-font font-medium text-sm">
              1
            </div>
            <div
              class="flex-grow md:pl-8 pl-6 flex sm:items-center items-start flex-col sm:flex-row">
              <div
                class="flex-shrink-0 w-24 h-24 bg-blue-100 text-blue-500 rounded-full inline-flex items-center justify-center">
                <svg
                  fill="none"
                  stroke="currentColor"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="2"
                  class="w-12 h-12"
                  viewBox="0 0 24 24">
                  <path
                    d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path>
                </svg>
              </div>
              <div class="flex-grow sm:pl-6 mt-6 sm:mt-0">
                <h2
                  class="font-semibold title-font text-gray-900 mb-1 text-2xl">
                  Find Your Device
                </h2>
                <p class="leading-relaxed text-lg">
                  Browse available devices and select what you need for your
                  project or class.
                </p>
              </div>
            </div>
          </div>
          <div class="flex relative pb-20 sm:items-center md:w-2/3 mx-auto">
            <div
              class="h-full w-6 absolute inset-0 flex items-center justify-center">
              <div class="h-full w-1 bg-gray-200 pointer-events-none"></div>
            </div>
            <div
              class="flex-shrink-0 w-6 h-6 rounded-full mt-10 sm:mt-0 inline-flex items-center justify-center bg-blue-500 text-white relative z-10 title-font font-medium text-sm">
              2
            </div>
            <div
              class="flex-grow md:pl-8 pl-6 flex sm:items-center items-start flex-col sm:flex-row">
              <div
                class="flex-shrink-0 w-24 h-24 bg-blue-100 text-blue-500 rounded-full inline-flex items-center justify-center">
                <svg
                  fill="none"
                  stroke="currentColor"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="2"
                  class="w-12 h-12"
                  viewBox="0 0 24 24">
                  <path d="M22 12h-4l-3 9L9 3l-3 9H2"></path>
                </svg>
              </div>
              <div class="flex-grow sm:pl-6 mt-6 sm:mt-0">
                <h2
                  class="font-semibold title-font text-gray-900 mb-1 text-2xl">
                  Reserve It
                </h2>
                <p class="leading-relaxed text-lg">
                  Select your device, choose the duration, and confirm your
                  reservation with a few clicks.
                </p>
              </div>
            </div>
          </div>
          <div class="flex relative pb-20 sm:items-center md:w-2/3 mx-auto">
            <div
              class="h-full w-6 absolute inset-0 flex items-center justify-center">
              <div class="h-full w-1 bg-gray-200 pointer-events-none"></div>
            </div>
            <div
              class="flex-shrink-0 w-6 h-6 rounded-full mt-10 sm:mt-0 inline-flex items-center justify-center bg-blue-500 text-white relative z-10 title-font font-medium text-sm">
              3
            </div>
            <div
              class="flex-grow md:pl-8 pl-6 flex sm:items-center items-start flex-col sm:flex-row">
              <div
                class="flex-shrink-0 w-24 h-24 bg-blue-100 text-blue-500 rounded-full inline-flex items-center justify-center">
                <svg
                  fill="none"
                  stroke="currentColor"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="2"
                  class="w-12 h-12"
                  viewBox="0 0 24 24">
                  <circle cx="12" cy="5" r="3"></circle>
                  <path d="M12 22V8M5 12H2a10 10 0 0020 0h-3"></path>
                </svg>
              </div>
              <div class="flex-grow sm:pl-6 mt-6 sm:mt-0">
                <h2
                  class="font-semibold title-font text-gray-900 mb-1 text-2xl">
                  Pick It Up
                </h2>
                <p class="leading-relaxed text-lg">
                  Visit the designated pickup location, show your reservation
                  confirmation, and collect your device.
                </p>
              </div>
            </div>
          </div>
          <div class="flex relative pb-10 sm:items-center md:w-2/3 mx-auto">
            <div
              class="h-full w-6 absolute inset-0 flex items-center justify-center">
              <div class="h-full w-1 bg-gray-200 pointer-events-none"></div>
            </div>
            <div
              class="flex-shrink-0 w-6 h-6 rounded-full mt-10 sm:mt-0 inline-flex items-center justify-center bg-blue-500 text-white relative z-10 title-font font-medium text-sm">
              4
            </div>
            <div
              class="flex-grow md:pl-8 pl-6 flex sm:items-center items-start flex-col sm:flex-row">
              <div
                class="flex-shrink-0 w-24 h-24 bg-blue-100 text-blue-500 rounded-full inline-flex items-center justify-center">
                <svg
                  fill="none"
                  stroke="currentColor"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="2"
                  class="w-12 h-12"
                  viewBox="0 0 24 24">
                  <path d="M20 21v-2a4 4 0 00-4-4H8a4 4 0 00-4 4v2"></path>
                  <circle cx="12" cy="7" r="4"></circle>
                </svg>
              </div>
              <div class="flex-grow sm:pl-6 mt-6 sm:mt-0">
                <h2
                  class="font-semibold title-font text-gray-900 mb-1 text-2xl">
                  Return It
                </h2>
                <p class="leading-relaxed text-lg">
                  At the end of your reservation, return the device to the
                  same location. Ensure it is in good condition to avoid any
                  fees.
                </p>
              </div>
            </div>
          </div>
        </div>
      </section>

      <section id="Features" class="text-gray-600 body-font">
        <div class="container px-5 py-24 mx-auto">
          <div
            class="flex flex-wrap w-full mb-20 flex-col items-center text-center">
            <h1
              class="sm:text-5xl text-2xl font-bold title-font mb-2 text-gray-900">
              Why <span class="text-[#0D6EFF]">Choose</span> Us?
            </h1>
            <p class="lg:w-1/2 w-full leading-relaxed text-gray-500">
              Whatever cardigan tote bag tumblr hexagon brooklyn asymmetrical
              gentrify, subway tile poke farm-to-table.
            </p>
          </div>
          <div class="flex flex-wrap -m-4">
            <div class="xl:w-1/3 md:w-1/2 p-4">
              <div class="border border-gray-200 p-6 rounded-lg">
                <div
                  class="w-10 h-10 inline-flex items-center justify-center rounded-full bg-blue-100 text-blue-500 mb-4">
                  <svg
                    fill="none"
                    stroke="currentColor"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    class="w-6 h-6"
                    viewBox="0 0 24 24">
                    <path d="M22 12h-4l-3 9L9 3l-3 9H2"></path>
                  </svg>
                </div>
                <h2 class="text-lg text-gray-900 font-medium title-font mb-2">
                  Real-Time Availability
                </h2>
                <p class="leading-relaxed text-base">
                  See which devices are available for borrowing in real-time,
                  eliminating guesswork and saving time.
                </p>
              </div>
            </div>
            <div class="xl:w-1/3 md:w-1/2 p-4">
              <div class="border border-gray-200 p-6 rounded-lg">
                <div
                  class="w-10 h-10 inline-flex items-center justify-center rounded-full bg-blue-100 text-blue-500 mb-4">
                  <svg
                    fill="none"
                    stroke="currentColor"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    class="w-6 h-6"
                    viewBox="0 0 24 24">
                    <circle cx="6" cy="6" r="3"></circle>
                    <circle cx="6" cy="18" r="3"></circle>
                    <path
                      d="M20 4L8.12 15.88M14.47 14.48L20 20M8.12 8.12L12 12"></path>
                  </svg>
                </div>
                <h2 class="text-lg text-gray-900 font-medium title-font mb-2">
                  Simple Reservation Process
                </h2>
                <p class="leading-relaxed text-base">
                  Reserve devices with just a few clicks. Our streamlined
                  process makes borrowing technology hass le-free.
                </p>
              </div>
            </div>
            <div class="xl:w-1/3 md:w-1/2 p-4">
              <div class="border border-gray-200 p-6 rounded-lg">
                <div
                  class="w-10 h-10 inline-flex items-center justify-center rounded-full bg-blue-100 text-blue-500 mb-4">
                  <svg
                    fill="none"
                    stroke="currentColor"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    class="w-6 h-6"
                    viewBox="0 0 24 24">
                    <path d="M20 21v-2a4 4 0 00-4-4H8a4 4 0 00-4 4v2"></path>
                    <circle cx="12" cy="7" r="4"></circle>
                  </svg>
                </div>
                <h2 class="text-lg text-gray-900 font-medium title-font mb-2">
                  Reminders
                </h2>
                <p class="leading-relaxed text-base">
                  Never miss a return deadline with our notification system
                  that sends timely reminders.
                </p>
              </div>
            </div>
            <div class="xl:w-1/3 md:w-1/2 p-4">
              <div class="border border-gray-200 p-6 rounded-lg">
                <div
                  class="w-10 h-10 inline-flex items-center justify-center rounded-full bg-blue-100 text-blue-500 mb-4">
                  <svg
                    fill="none"
                    stroke="currentColor"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    class="w-6 h-6"
                    viewBox="0 0 24 24">
                    <path
                      d="M4 15s1-1 4-1 5 2 8 2 4-1 4-1V3s-1 1-4 1-5-2-8-2-4 1-4 1zM4 22v-7"></path>
                  </svg>
                </div>
                <h2 class="text-lg text-gray-900 font-medium title-font mb-2">
                  Melanchole
                </h2>
                <p class="leading-relaxed text-base">
                  Fingerstache flexitarian street art 8-bit waist co, subway
                  tile poke farm.
                </p>
              </div>
            </div>
            <div class="xl:w-1/3 md:w-1/2 p-4">
              <div class="border border-gray-200 p-6 rounded-lg">
                <div
                  class="w-10 h-10 inline-flex items-center justify-center rounded-full bg-blue-100 text-blue-500 mb-4">
                  <svg
                    fill="none"
                    stroke="currentColor"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    class="w-6 h-6"
                    viewBox="0 0 24 24">
                    <path
                      d="M21 12.79A9 9 0 1111.21 3 7 7 0 0021 12.79z"></path>
                  </svg>
                </div>
                <h2 class="text-lg text-gray-900 font-medium title-font mb-2">
                  Bunker
                </h2>
                <p class="leading-relaxed text-base">
                  Fingerstache flexitarian street art 8-bit waist co, subway
                  tile poke farm.
                </p>
              </div>
            </div>
            <div class="xl:w-1/3 md:w-1/2 p-4">
              <div class="border border-gray-200 p-6 rounded-lg">
                <div
                  class="w-10 h-10 inline-flex items-center justify-center rounded-full bg-blue-100 text-blue-500 mb-4">
                  <svg
                    fill="none"
                    stroke="currentColor"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    class="w-6 h-6"
                    viewBox="0 0 24 24">
                    <path
                      d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path>
                  </svg>
                </div>
                <h2 class="text-lg text-gray-900 font-medium title-font mb-2">
                  Ramona Falls
                </h2>
                <p class="leading-relaxed text-base">
                  Fingerstache flexitarian street art 8-bit waist co, subway
                  tile poke farm.
                </p>
              </div>
            </div>
          </div>
        </div>
      </section>

      <footer class="text-white body-font bg-[#0C0C0C]">
        <div class="flex flex-col text-center w-full bg-[#0D6EFF] py-10">
          <h1 class="sm:text-5xl text-3xl font-bold title-font text-white">
            Ready to Streamline Device Lending?
          </h1>
          <h2
            class="text-m text-white tracking-widest font-medium title-font mb-1 mt-2">
            Join your campus community in making technology access easier and
            more efficient for everyone.
          </h2>
        </div>
        <div
          class="container px-5 py-8 mx-auto flex items-center sm:flex-row flex-col">
          <a
            class="flex title-font font-medium items-center md:justify-start justify-center text-white">
            <svg
              xmlns="http://www.w3.org/2000/svg"
              fill="none"
              stroke="currentColor"
              stroke-linecap="round"
              stroke-linejoin="round"
              stroke-width="2"
              class="w-10 h-10 text-white p-2 bg-blue-500 rounded-full"
              viewBox="0 0 24 24">
              <path
                d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"></path>
            </svg>
            <span class="ml-3 text-xl">JustInCase</span>
          </a>
          <p
            class="text-sm text-gray-300 sm:ml-4 sm:pl-4 sm:border-l-2 sm:border-gray-200 sm:py-2 sm:mt-0 mt-4">
            © 2025 JustInCase —
            <a
              href="https://twitter.com/knyttneve"
              class="text-white ml-1"
              rel="noopener noreferrer"
              target="_blank">
              All rights reserved.
            </a>
          </p>
          <span
            class="inline-flex sm:ml-auto sm:mt-0 mt-4 justify-center sm:justify-start">
            <a class="text-white">
              <svg
                fill="currentColor"
                stroke-linecap="round"
                stroke-linejoin="round"
                stroke-width="2"
                class="w-5 h-5"
                viewBox="0 0 24 24">
                <path
                  d="M18 2h-3a5 5 0 00-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 011-1h3z"></path>
              </svg>
            </a>
            <a class="ml-3 text-white">
              <svg
                fill="currentColor"
                stroke-linecap="round"
                stroke-linejoin="round"
                stroke-width="2"
                class="w-5 h-5"
                viewBox="0 0 24 24">
                <path
                  d="M23 3a10.9 10.9 0 01-3.14 1.53 4.48 4.48 0 00-7.86 3v1A10.66 10.66 0 013 4s-4 9 5 13a11.64 11.64 0 01-7 2c9 5 20 0 20-11.5a4.5 4.5 0 00-.08-.83A7.72 7.72 0 0023 3z"></path>
              </svg>
            </a>
            <a class="ml-3 text-white">
              <svg
                fill="none"
                stroke="currentColor"
                stroke-linecap="round"
                stroke-linejoin="round"
                stroke-width="2"
                class="w-5 h-5"
                viewBox="0 0 24 24">
                <rect width="20" height="20" x="2" y="2" rx="5" ry="5"></rect>
                <path
                  d="M16 11.37A4 4 0 1112.63 8 4 4 0 0116 11.37zm1.5-4.87h.01"></path>
              </svg>
            </a>
            <a class="ml-3 text-white">
              <svg
                fill="currentColor"
                stroke="currentColor"
                stroke-linecap="round"
                stroke-linejoin="round"
                stroke-width="0"
                class="w-5 h-5"
                viewBox="0 0 24 24">
                <path
                  stroke="none"
                  d="M16 8a6 6 0 016 6v7h-4v-7a2 2 0 00-2-2 2 2 0 00-2 2v7h-4v-7a6 6 0 016-6zM2 9h4v12H2z"></path>
                <circle cx="4" cy="4" r="2" stroke="none"></circle>
              </svg>
            </a>
          </span>
        </div>
      </footer>
    </main>
  </div>
</body>

<!-- JavaScript -->
<script>
  let lastScrollY = window.scrollY;
  const header = document.getElementById('main-header');

  window.addEventListener('scroll', () => {
    if (window.scrollY > lastScrollY && window.scrollY > 50) {
      // Scrolling down
      header.classList.add('header-hide');
    } else {
      // Scrolling up
      header.classList.remove('header-hide');
    }
    lastScrollY = window.scrollY;
  });
</script>

</html>