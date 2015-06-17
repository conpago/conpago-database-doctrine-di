<?php
	/**
	 * Created by PhpStorm.
	 * User: Bartosz Gołek
	 * Date: 2014-06-24
	 * Time: 21:01
	 */

	namespace Conpago\Database\Doctrine;

	use Conpago\DI\IContainer;
	use Conpago\DI\IContainerBuilder;
	use Conpago\DI\IModule;

	class DoctrineDatabaseModule implements IModule
	{

		public function build(IContainerBuilder $builder)
		{
			$builder
				->registerType('Conpago\Database\Doctrine\EntityManagerFactory');

			$builder
				->register(function (IContainer $c)
				{
					/** @var EntityManagerFactory $entityManagerFactory */
					$entityManagerFactory = $c->resolve('Conpago\Database\Doctrine\EntityManagerFactory');

					return $entityManagerFactory->createEntityManager();
				})
				->asA('Doctrine\ORM\EntityManagerInterface');
		}
	}
