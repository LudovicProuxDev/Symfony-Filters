<?php

namespace App\Controller;

use App\Repository\CategoryRepository;
use App\Repository\ColorRepository;
use App\Repository\ItemRepository;
use ArrayIterator;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class IndexController extends AbstractController
{
    #[Route('/', name: 'app_index', methods:['GET'])]
    public function index(Request $request, ItemRepository $itemRepository, CategoryRepository $categoryRepository, ColorRepository $colorRepository): Response
    {
        $filters = [];
        $filters['name'] = $request->query->get('name');
        $filters['quantity'] = $request->query->get('quantity');
        $filters['category'] = $request->query->get('category');
        $filters['color'] = $request->query->get('color');

        return $this->render('index/index.html.twig', [
            'listItems' => $itemRepository->findByFilters($filters),
            'listCategories' => $categoryRepository->findAll(),
            'listColors' => $colorRepository->findAll(),
        ]);
    }

    #[Route('/limit/page{num}', name: 'app_limit', requirements: ['num' => '\d+'], condition: "params['num'] >= 1", methods:['GET'])]
    public function limit(int $num, Request $request, ItemRepository $itemRepository, CategoryRepository $categoryRepository, ColorRepository $colorRepository): Response
    {
        $filters = [];
        $filters['name'] = $request->query->get('name');
        $filters['quantity'] = $request->query->get('quantity');
        $filters['category'] = $request->query->get('category');
        $filters['color'] = $request->query->get('color');

        $offset = ($num - 1) * 2;

        return $this->render('index/limit.html.twig', [
            'listItems' => $itemRepository->findByFiltersAndLimit($filters,$offset),
            'listCategories' => $categoryRepository->findAll(),
            'listColors' => $colorRepository->findAll(),
        ]);
    }

    #[Route('/limitpaginator', name: 'app_limit_paginator', methods:['GET'])]
    public function limitPaginator(Request $request, ItemRepository $itemRepository, CategoryRepository $categoryRepository, ColorRepository $colorRepository): Response
    {
        $filters = [];
        $filters['name'] = ($request->query->get('name')) ? $request->query->get('name') : '';
        $filters['quantity'] = ($request->query->get('quantity')) ? $request->query->get('quantity') : '';
        $filters['category'] = ($request->query->get('category')) ? $request->query->get('category') : '';
        $filters['color'] = ($request->query->get('color')) ? $request->query->get('color') : '';

        $page = ($request->query->get('page')) ? $request->query->get('page') : 1;
        $offset = ($page - 1) * 2;

        $paginator = $itemRepository->findByFiltersAndLimitWithPaginator($filters,$offset);
        $listItems = new ArrayIterator($paginator->getIterator());
        $totalItems = $paginator->count();
        $numberPages = intdiv($totalItems,2) + ($totalItems % 2);

        return $this->render('index/limit-paginator.html.twig', [
            'listItems' => $listItems,
            'numberPages' => $numberPages,
            'filters' => $filters,
            'listCategories' => $categoryRepository->findAll(),
            'listColors' => $colorRepository->findAll(),
        ]);
    }
    
}
                