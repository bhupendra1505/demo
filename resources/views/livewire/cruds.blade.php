<div>
<div class="container mx-auto">

    <div class="row ">
        <section class="flex items-center  p-8 bg-gray-50 dark:bg-gray-900">
            <div class="w-full max-w-screen-xl px-4 mx-auto lg:px-12">
                <!-- Start coding here -->
                <div class="relative overflow-hidden bg-white shadow-md dark:bg-gray-800 sm:rounded-lg">
                    <div class="flex-row items-center justify-between p-4 space-y-3 sm:flex sm:space-y-0 sm:space-x-4">
                        <div>
                            <h5 class="mr-3 font-semibold dark:text-white">Laravel Learning</h5>

                        </div>
                        
                        <div x-data="{ isOpen: $wire.entangle('isOpen') }">
                            <button class="bg-blue-700 text-white px-4 py-3 mt-4 text-sm rounded"
                                @click="isOpen = true
                        $nextTick(() => $refs.modalCloseButton.focus())">
                                New User
                            </button>

                            <div wire:ignore.self style="background-color: rgba(0, 0, 0, .5)"
                                class="mx-auto fixed top-0 left-0 w-full h-full flex items-center shadow-lg overflow-y-auto"
                                x-show="isOpen">
                                <div class="container mx-auto rounded p-4 mt-2 overflow-y-auto">
                                    <div class="bg-white rounded px-8 py-8">
                                        <h1 class="font-bold text-2xl mb-3">New User</h1>

                                        <div class="modal-body">

                                            <form action="#">
                                                <div class="grid sm:grid-cols-1 sm:gap-6">
                                                    <div class="w-full">
                                                        <label
                                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">First
                                                            Name</label>
                                                        <input type="text"
                                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                            placeholder="Enter Your First Name" required=""
                                                            wire:model.defer="first_name">
                                                        @error('first_name')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                    <div class="w-full">
                                                        <label
                                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Last
                                                            Name</label>
                                                        <input type="text"
                                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                            placeholder="Enter Your Last Name" required=""
                                                            wire:model.defer="last_name">
                                                        @error('last_name')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                    <div class="w-full">
                                                        <label
                                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email
                                                            Address</label>
                                                        <input type="email"
                                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                            placeholder="Enter Your Email Address" required=""
                                                            wire:model.defer="email">
                                                        @error('email')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                   
                                                    <div class="w-full">
                                                        <div wire:ignore wire:model.defer="role" >
                                                            <select id="select2-dropdown">
                                                                <option value="" selected>Select Option</option>
                                                                @foreach($users_role as $user_role)
                                                                <option value="{{ $user_role }}">{{ $user_role }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>

                                                <button wire:click.prevent="store()"
                                                    class="px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-blue-700 rounded-lg focus:ring-4 focus:ring-blue-200 dark:focus:ring-blue-900 hover:bg-blue-800"  >
                                                    Save
                                                </button>

                                                <button
                                                    class="px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-red-700 rounded-lg focus:ring-4 focus:ring-red-200 dark:focus:ring-red-900 hover:bg-red-800"
                                                    @click="isOpen = false" x-ref="modalCloseButton">
                                                    Close
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @if (session()->has('message'))
                        <div class="text-center mt-4">
                            <h1 class="text-center">{{ session('message') }}</h1>
                        </div>
                    @endif

                    <div class="p-6 overflow-x-auto">
                        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                            <thead
                                class="text-xs text-gray-700 uppercase bg-gray-100 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-6 py-3 rounded-l-lg">
                                        #
                                    </th>
                                    <th scope="col" class="px-6 py-3 rounded-l-lg">
                                        Full name
                                    </th>
                                    <th scope="col" class="px-6 py-3 rounded-r-lg">
                                        Email
                                    </th>
                                    <th scope="col" class="px-6 py-3 rounded-r-lg">
                                        Role
                                    </th>
                                    <th scope="col" class="px-6 py-3 rounded-r-lg">
                                        Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (count($users) >= 1)
                                   
                                    @foreach ($users as $user)
                                        <tr class="bg-white dark:bg-gray-800">
                                            <td class="px-6 py-4">
                                                {{ $loop->iteration }}
                                            </td>
                                            <th scope="row"
                                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                               
                                                {{ $user->first_name . ' ' . $user->last_name }}
                                            </th>
                                            <td class="px-6 py-4">
                                                {{ $user->email }}
                                            </td>
                                            <td class="px-6 py-4">
                                                {{ $user->role }}
                                            </td>
                                            <td class="px-6 py-4">

                                                <div class="inline-flex rounded-md shadow-sm" role="group">
                                                    <button wire:click="edit({{ $user['id'] }})" type="button"
                                                        class="px-4 py-2 text-sm font-medium text-gray-900 bg-transparent border border-gray-900 rounded-l-lg hover:bg-gray-900 hover:text-white focus:z-10 focus:ring-2 focus:ring-gray-500 focus:bg-gray-900 focus:text-white dark:border-white dark:text-white dark:hover:text-white dark:hover:bg-gray-700 dark:focus:bg-gray-700">
                                                        Update
                                                    </button>
                                                    <button wire:click="deleteId({{ $user->id }})" type="button"
                                                        class="px-4 py-2 text-sm font-medium text-gray-900 bg-transparent border border-gray-900 rounded-r-md hover:bg-gray-900 hover:text-white focus:z-10 focus:ring-2 focus:ring-gray-500 focus:bg-gray-900 focus:text-white dark:border-white dark:text-white dark:hover:text-white dark:hover:bg-gray-700 dark:focus:bg-gray-700">
                                                        Delete
                                                    </button>
                                                    
                                                    
                                                </div>
                                            </td>
                                        </tr>
                                     
                                    @endforeach
                                @endif
                            </tbody>

                        </table>
                    </div>

                </div>
            </div>
        </section>


        <div x-data="{ updateModal: $wire.entangle('updateModal') }">
            <div wire:ignore.self style="background-color: rgba(0, 0, 0, .5)"
                class="mx-auto fixed top-0 left-0 w-full h-full flex items-center shadow-lg overflow-y-auto"
                x-show="updateModal">
                <div class="container mx-auto rounded p-4 mt-2 overflow-y-auto">
                    <div class="bg-white rounded px-8 py-8">
                        <h1 class="font-bold text-2xl mb-3">Update User</h1>

                        <div class="modal-body">
                            <form action="#">
                                <div class="grid sm:grid-cols-1 sm:gap-6">
                                    <div class="w-full">
                                        <label
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">First
                                            Name</label>
                                            <input type="hidden" wire:model="cid">
                                        <input type="text"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                            placeholder="Enter Your First Name" required=""
                                            wire:model.defer="first_names">
                                        @error('first_name')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="w-full">
                                        <label
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Last
                                            Name</label>
                                        <input type="text"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                            placeholder="Enter Your Last Name" required=""
                                            wire:model.defer="last_names">
                                        @error('last_name')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="w-full">
                                        <label
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email
                                            Address</label>
                                        <input type="email"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                            placeholder="Enter Your Email Address" required=""
                                            wire:model.defer="emails">
                                        @error('email')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="w-full">
                                        <label
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select
                                            your Role</label>
                                        <select wire:model.defer="roles"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                            <option selected>Select Role</option>
                                            <option value="admin">Admin</option>
                                            <option value="employee">Employee</option>
                                        </select>
                                    </div>
                                </div>

                                <button wire:click.prevent="update()"
                                    class="px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-blue-700 rounded-lg focus:ring-4 focus:ring-blue-200 dark:focus:ring-blue-900 hover:bg-blue-800"  >
                                    Update
                                </button>

                                <button
                                    class="px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-red-700 rounded-lg focus:ring-4 focus:ring-red-200 dark:focus:ring-red-900 hover:bg-red-800"
                                    @click="updateModal = false" x-ref="modalCloseButton">
                                    Close
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div x-data="{ deleteModal: $wire.entangle('deleteModal') }">
            <div wire:ignore.self style="background-color: rgba(0, 0, 0, .5)"
                class="fixed top-0 left-0 w-full h-full flex items-center shadow-lg overflow-y-auto"
                x-show="deleteModal">
                <div class="container mx-auto rounded p-4 mt-2 overflow-y-auto">
                    <div class="bg-white rounded px-8 py-8">
                        <h1 class="font-bold text-2xl mb-3">Confirmation for Delete User</h1>

                        <div class="modal-body">
                            <form action="#">
                                <div class="grid sm:grid-cols-1 sm:gap-6">
                                    <div class="w-full">
                                        <label
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Are you sure want Delete User ?</label>
                                            <input type="hidden"  wire:model="deleteId">
                                    </div>
                                </div>

                                <button wire:click.prevent="delete()"
                                    class="px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-blue-700 rounded-lg focus:ring-4 focus:ring-blue-200 dark:focus:ring-blue-900 hover:bg-blue-800"  >
                                    Update
                                </button>

                                <button
                                    class="px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-red-700 rounded-lg focus:ring-4 focus:ring-red-200 dark:focus:ring-red-900 hover:bg-red-800"
                                    @click="deleteModal = false" x-ref="modalCloseButton">
                                    Close
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
       
    </div>
</div>
        @section('scripts')
        <script>
            $(document).ready(function () {
                $('#select2-dropdown').select2();
                $('#select2-dropdown').on('change', function (e) {
                    var data = $('#select2-dropdown').select2("val");
                    @this.set('role', data);
                });
            });
        </script>
        @endsection
    </div>
   