<?php

namespace AppBundle\Command;

use AppBundle\Entity\MentionFactory;
use AppBundle\Twitter\Statuses;
use DateTime;
use Doctrine\ORM\EntityManager;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class AppTwitterSaveMentionsCommand extends ContainerAwareCommand
{
    const NAME = 'app:twitter:save-mentions';
    /**
     * @var Statuses
     */
    private $mentionsService;
    /**
     * @var EntityManager
     */
    private $entityManager;
    /**
     * @var MentionFactory
     */
    private $mentionFactory;

    /**
     * AppTwitterSaveMentionsCommand constructor.
     * @param Statuses $mentionsService
     * @param EntityManager $entityManager
     * @param MentionFactory $mentionFactory
     */
    public function __construct(Statuses $mentionsService, EntityManager $entityManager, MentionFactory $mentionFactory)
    {
        parent::__construct(self::NAME);
        $this->mentionsService = $mentionsService;
        $this->entityManager = $entityManager;
        $this->mentionFactory = $mentionFactory;
    }

    protected function configure()
    {
        $this
            ->setName(self::NAME)
            ->setDescription('Find all tweets sent to configured user and store them in the db')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $output->writeln('Start');
        $mentions = $this->mentionsService->getMentions();

        foreach ($mentions as $mention) {
            $entity = $this->mentionFactory->create(
                $mention->id,
                $mention->user->id,
                $mention->user->screen_name,
                $mention->text,
                new DateTime($mention->created_at)
            );
            $this->entityManager->persist($entity);
        }

        $this->entityManager->flush();
        $output->writeln('Finished');
    }
}
