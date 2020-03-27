/* ************************************************************************** */
/*                                                                            */
/*                                                        :::      ::::::::   */
/*   main.c                                             :+:      :+:    :+:   */
/*                                                    +:+ +:+         +:+     */
/*   By: jeagan <jeagan@student.42.fr>              +#+  +:+       +#+        */
/*                                                +#+#+#+#+#+   +#+           */
/*   Created: 2019/05/03 10:24:20 by jeagan            #+#    #+#             */
/*   Updated: 2019/06/02 14:10:21 by jeagan           ###   ########.fr       */
/*                                                                            */
/* ************************************************************************** */

#include "fill_it.h"

static int	min_size(int bk)
{
	int size;

	while (bk >= 4)
	{
		size = 2;
		while (size * size <= bk)
		{
			if (size * size == bk)
				return (size);
			size++;
		}
		bk++;
	}
	return (0);
}

static char	**map_init(int size, char c)
{
	char	**map;
	int		i;
	int		j;

	if (!(map = (char **)malloc(sizeof(char *) * (size + 1))))
		return ((char **)0);
	i = -1;
	while (++i < size)
		if (!(map[i] = (char *)malloc(sizeof(char) * (size + 1))))
			return ((char **)0);
	i = -1;
	while (++i < size && (j = -1))
	{
		while (++j < size)
			map[i][j] = c;
		map[i][j] = '\0';
	}
	map[i] = 0;
	return (map);
}

static int	run_solver(int itb[26][5][2], int n_bk)
{
	int		size;
	char	**map;

	size = min_size(n_bk * 4);
	if (!(map = map_init(size, '.')))
		return (0);
	while (solver(map, itb, n_bk, 0))
	{
		free_tab(map, 0);
		if (!(map = map_init(++size, '.')))
			return (0);
	}
	free_tab(map, 1);
	return (0);
}

static int	copy_file(int fd, char *save, char buf[BUFF_SIZE + 1])
{
	char	*tmp_read;
	int		data_tb[26][5][2];
	int		re;

	while ((re = read(fd, buf, BUFF_SIZE)) > 0)
	{
		buf[re] = '\0';
		if (!(buf[re - 1] == '\n' || buf[re - 1] == '.' || buf[re - 1] == '#'))
			return (free_put_error(save));
		if (!(tmp_read = ft_strjoin(save, buf)))
			return (0);
		free(save);
		save = tmp_read;
		if (!(check_file(save, data_tb)))
			return (free_put_error(save));
	}
	if (!((ft_strlen(save) - 20) % 21) && (int)ft_strlen(save) >= 20)
	{
		re = (int)(ft_strlen(save) - 20) / 21 + 1;
		free(save);
		return (run_solver(data_tb, re));
	}
	return (free_put_error(save));
}

int			main(int ac, char **av)
{
	int		fd;
	char	*save;
	char	buf[BUFF_SIZE + 1];

	if (!((ac != 2) || (fd = open(av[1], O_RDONLY)) < 0 || fd >= OPEN_MAX
		|| !(save = ft_strnew(0)) || read(fd, buf, 0)))
		return (copy_file(fd, save, buf));
	else
		return (free_put_error(save));
	close(fd);
	return (0);
}
