<?php

class Dashboard extends SessionController{

    private $username;

    function __construct(){
        parent::__construct();

        $this->username = $this->getusernameSessionData();
        error_log("Dashboard::constructor() ");
    }

     function render(){
        error_log("Dashboard::RENDER() ");
        $expensesModel          = new ExpensesModel();
        $expenses               = $this->getExpenses(5);
        $totalThisMonth         = $expensesModel->getTotalAmountThisMonth($this->username->getId());
        $maxExpensesThisMonth   = $expensesModel->getMaxExpensesThisMonth($this->username->getId());
        $categories             = $this->getCategories();
        

        $this->view->render('dashboard', [
            'username'                 => $this->usernamename,
            'password'             => $password,
            'expenses'             => $expenses,
            'totalAmountThisMonth' => $totalThisMonth,
            'maxExpensesThisMonth' => $maxExpensesThisMonth,
            'categories'           => $categories
        ]);
    }
    
    //obtiene la lista de expenses y $n tiene el número de expenses por transacción
    private function getExpenses($n = 0){
        if($n < 0) return NULL;
        error_log("Dashboard::getExpenses() id = " . $this->username->getId());
        $expenses = new ExpensesModel();
        return $expenses->getByusernameIdAndLimit($this->username->getId(), $n);   
    }

    function getCategories(){
        $res = [];
        $categoriesModel = new CategoriesModel();
        $expensesModel = new ExpensesModel();

        $categories = $categoriesModel->getAll();

        foreach ($categories as $category) {
            $categoryArray = [];
            //obtenemos la suma de amount de expenses por categoria
            $total = $expensesModel->getTotalByCategoryThisMonth($category->getId(), $this->username->getId());
            // obtenemos el número de expenses por categoria por mes
            $numberOfExpenses = $expensesModel->getNumberOfExpensesByCategoryThisMonth($category->getId(), $this->username->getId());
            
            if($numberOfExpenses > 0){
                $categoryArray['total'] = $total;
                $categoryArray['count'] = $numberOfExpenses;
                $categoryArray['category'] = $category;
                array_push($res, $categoryArray);
            }
            
        }
        return $res;
    }
}

?>