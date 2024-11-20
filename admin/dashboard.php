<?php
include_once($_SERVER['DOCUMENT_ROOT'] . "/utils/functions.php");
$report_unsolved = query("SELECT  COUNT(status) as status FROM reports WHERE status = 0");
$report_solved = query("SELECT COUNT(status) as status FROM reports WHERE status = 1");

$roles = query("SELECT * FROM roles");

$reports = query("SELECT reports.*, users.name FROM reports JOIN users ON users.id = reports.user_id");

?>


<div class="p-4">
   <div class="p-5">
      <div class="grid grid-cols-2 w-full gap-2" >
         <div class="flex items-center justify-center h-auto rounded bg-[#00bCF2] ">
        <a href="#" class="flex flex-col text-center w-full py-6 h-full">
         <h5 class="mb-2 text-xl md:text-7xl font-bold tracking-tight text-gray-900 dark:text-white">
                <?= $report_unsolved[0]['status'] ?>
            </h5>
            <p class="font-normal text-white text-xl">
                Laporan masuk
            </p>
            </a>
         </div>
         <div class="flex items-center justify-center h-auto rounded bg-[#BAD80A] ">
        <a href="#" class="flex flex-col text-center w-full py-6 h-full">
         <h5 class="mb-2 text-xl md:text-7xl font-bold tracking-tight text-gray-900 dark:text-white">
         <?= $report_solved[0]['status'] ?>
            </h5>
            <p class="font-normal text-white text-xl">
            Laporan Selesai
            </p>
            </a>
         </div>
   </div>
</div>
</div>


<div class="relative overflow-x-auto sm:rounded-lg mt-4">
    <table class="w-full text-sm text-left rtl:text-right text-gray-500" id="pagination-table">
        <thead class="text-xs text-white uppercase bg-[#00bCF2]">
            <tr>
                <th scope="col" class="px-6 py-3">
                    No.
                </th>
                <th scope="col" class="px-6 py-3">
                    Sender
                </th>
                <th scope="col" class="px-6 py-3">
                    Title
                </th>
                <th scope="col" class="px-6 py-3">
                    Created at
                </th>
                <th scope="col" class="px-6 py-3">
                    Status
                </th>
                <th scope="col" class="px-6 py-3">
                    Action
                </th>
            </tr>
        </thead>
        <tbody>
            <?php if (empty($reports)) : ?>
                <tr>
                    <td colspan="6" class="bg-blue-400 px-6 py-4 text-center text-white">
                        Data kosong
                    </td>
                </tr>
            <?php else :
                $no = 1;
            ?>
                <?php foreach ($reports as $report) : ?>
                    <tr class="bg-[#00bCF2] border-b hover:bg-[#1187a8] text-white">
                        <td class="px-6 py-4 font-bold">
                            <?= $no++ ?>
                        </td>
                        <td class="px-6 py-4 font-bold">
                            <?= $report['name'] ?>
                        </td>
                        <th scope="row" class="px-6 py-4 font-medium text-white whitespace-nowrap">
                            <?= $report['title'] ?>
                        </th>
                        <td class="px-6 py-4">
                            <?= $report['created_at'] ?>
                        </td>
                        <td class="px-6 py-4">
                            <?= $report['status'] == 0 ?  "Not solved" : "Solved" ?>
                        </td>
                        <td class="px-6 py-4 flex justify-start items-center ">
                            <a href="index.php?page=detail&id=<?= $report['id'] ?>" class="font-medium text-white hover:underline">
                                <svg class="mr-4 w-4 h-4 md:w-5 md:h-5 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                    <path fill-rule="evenodd" d="M4.998 7.78C6.729 6.345 9.198 5 12 5c2.802 0 5.27 1.345 7.002 2.78a12.713 12.713 0 0 1 2.096 2.183c.253.344.465.682.618.997.14.286.284.658.284 1.04s-.145.754-.284 1.04a6.6 6.6 0 0 1-.618.997 12.712 12.712 0 0 1-2.096 2.183C17.271 17.655 14.802 19 12 19c-2.802 0-5.27-1.345-7.002-2.78a12.712 12.712 0 0 1-2.096-2.183 6.6 6.6 0 0 1-.618-.997C2.144 12.754 2 12.382 2 12s.145-.754.284-1.04c.153-.315.365-.653.618-.997A12.714 12.714 0 0 1 4.998 7.78ZM12 15a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z" clip-rule="evenodd" />
                                </svg>
                            </a>

                            <a href="#" onclick="confirmDelete('reports_delete', 'id',<?= $report['id'] ?>)" class="font-medium text-white hover:underline">
                                <svg class="w-4 h-4 md:w-5 md:h-5 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 7h14m-9 3v8m4-8v8M10 3h4a1 1 0 0 1 1 1v3H9V4a1 1 0 0 1 1-1ZM6 7h12v13a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V7Z" />
                                </svg>
                            </a>
                        </td>
                    </tr>
                <?php endforeach ?>
            <?php endif ?>
        </tbody>
    </table>
</div>

<?php
if (isset($_POST['submit'])) {
    handleFormSubmit($_POST, 'users', 'add');
}

if (isset($_POST['update'])) {
    handleFormSubmit($_POST, 'users', 'update');
}
?>